<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $data = [
            'user' => $user,
            'balance' => $user->balance ?? 0,
            'recent_transactions' => Payment::where('user_id', $user->id)
                                          ->orderBy('created_at', 'desc')
                                          ->take(5)
                                          ->get(),
            'monthly_spending' => Payment::where('user_id', $user->id)
                                        ->where('type', 'debit')
                                        ->whereMonth('created_at', now()->month)
                                        ->sum('amount'),
        ];

        return view('payment.index', $data);
    }

    public function showTopup()
    {
        $user = Auth::user();
        
        $predefined_amounts = [10000, 25000, 50000, 100000, 200000, 500000];
        
        $data = [
            'user' => $user,
            'current_balance' => $user->balance ?? 0,
            'predefined_amounts' => $predefined_amounts,
            'payment_methods' => [
                'gopay' => 'GoPay',
                'ovo' => 'OVO',
                'dana' => 'DANA',
                'shopeepay' => 'ShopeePay',
                'bank_transfer' => 'Transfer Bank',
                'credit_card' => 'Kartu Kredit'
            ]
        ];

        return view('payment.topup', $data);
    }

    public function processTopup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000|max:5000000',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();
        $amount = $request->amount;
        $paymentMethod = $request->payment_method;

        try {
            DB::beginTransaction();

            $payment = Payment::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'type' => 'credit', 
                'status' => 'pending',
                'payment_method' => $paymentMethod,
                'description' => 'Top up saldo via ' . $paymentMethod,
                'transaction_id' => 'TXN' . time() . rand(1000, 9999),
            ]);

            $this->simulatePaymentProcess($payment);

            if ($payment->status === 'completed') {
                // Update balance user
                $user->increment('balance', $amount);
                
                DB::commit();
                
                return redirect()->route('payment.index')
                    ->with('success', 'Top up berhasil! Saldo Anda telah bertambah Rp ' . number_format($amount, 0, ',', '.'));
            } else {
                DB::rollback();
                return back()->with('error', 'Top up gagal. Silakan coba lagi.');
            }

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function history()
    {
        $user = Auth::user();
        
        $payments = Payment::where('user_id', $user->id)
                          ->orderBy('created_at', 'desc')
                          ->paginate(15);

        return view('payment.history', compact('payments'));
    }

    public function balance()
    {
        $user = Auth::user();
        
        $data = [
            'current_balance' => $user->balance ?? 0,
            'total_topup' => Payment::where('user_id', $user->id)
                                   ->where('type', 'credit')
                                   ->where('status', 'completed')
                                   ->sum('amount'),
            'total_spent' => Payment::where('user_id', $user->id)
                                   ->where('type', 'debit')
                                   ->where('status', 'completed')
                                   ->sum('amount'),
        ];

        return view('payment.balance', $data);
    }

    private function simulatePaymentProcess($payment)
    {
        sleep(1);
        
        $success = rand(1, 100) <= 95;
        
        if ($success) {
            $payment->update([
                'status' => 'completed',
                'processed_at' => now(),
            ]);
        } else {
            $payment->update([
                'status' => 'failed',
                'processed_at' => now(),
            ]);
        }
    }

    public function apiTopup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000|max:5000000',
            'payment_method' => 'required|string',
        ]);

        $user = Auth::user();
        $result = $this->processTopup($request);

        if ($result->getSession()->has('success')) {
            return response()->json([
                'success' => true,
                'message' => 'Top up berhasil',
                'new_balance' => $user->fresh()->balance
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Top up gagal'
            ], 400);
        }
    }
}