<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Rental;
use App\Models\Payment;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        $stats = [
            'total_rides' => Rental::where('user_id', $user->id)
                                  ->where('status', 'completed')
                                  ->count(),
            'total_distance' => Rental::where('user_id', $user->id)
                                     ->where('status', 'completed')
                                     ->sum('distance') ?? 0,
            'total_spent' => Payment::where('user_id', $user->id)
                                   ->where('type', 'debit')
                                   ->where('status', 'completed')
                                   ->sum('amount') ?? 0,
            'member_since' => $user->created_at->format('F Y'),
            'current_balance' => $user->balance ?? 0,
        ];

        $recent_activities = Rental::where('user_id', $user->id)
                                  ->orderBy('created_at', 'desc')
                                  ->take(5)
                                  ->get();

        return view('profile.show', compact('user', 'stats', 'recent_activities'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;

        if ($request->hasFile('avatar')) {

            if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            $avatarName = time() . '_' . $user->id . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);
            $user->avatar = $avatarName;
        }

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }
            
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile berhasil diperbarui!');
    }

    public function getAvatarUrl($user = null)
    {
        if (!$user) {
            $user = Auth::user();
        }

        if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
            return Storage::url('avatars/' . $user->avatar);
        }

        $initial = strtoupper(substr($user->name, 0, 1));
        $bgColor = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD', '#98D8C8'];
        $color = $bgColor[ord($initial) % count($bgColor)];

        return "https://ui-avatars.com/api/?name={$initial}&color=fff&background=" . substr($color, 1);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        $activeRentals = Rental::where('user_id', $user->id)
                              ->where('status', 'active')
                              ->count();

        if ($activeRentals > 0) {
            return back()->withErrors(['error' => 'Tidak dapat menghapus akun karena masih memiliki rental aktif.']);
        }

        if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
            Storage::delete('public/avatars/' . $user->avatar);
        }

        Auth::logout();
        $user->delete();

        return redirect()->route('register')->with('success', 'Akun berhasil dihapus.');
    }
}