<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bike;
use App\Models\Rental;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $data = [
            'user' => $user,
            'balance' => $user->balance ?? 0,
            'available_bikes' => Bike::where('status', 'available')->count(),
            'active_rental' => Rental::where('user_id', $user->id)
                                   ->where('status', 'active')
                                   ->first(),
            'total_rides' => Rental::where('user_id', $user->id)
                                  ->where('status', 'completed')
                                  ->count(),
            'nearby_bikes' => Bike::where('status', 'available')
                                 ->take(5)
                                 ->get(),
            'recent_activities' => Rental::where('user_id', $user->id)
                                        ->orderBy('created_at', 'desc')
                                        ->take(3)
                                        ->get(),
        ];

        return view('dashboard.index', $data);
    }

    public function getSidebarData()
    {
        return [
            'menu_items' => [
                [
                    'name' => 'Beranda',
                    'route' => 'dashboard',
                    'icon' => 'fas fa-home',
                    'active' => request()->routeIs('dashboard')
                ],
                [
                    'name' => 'Sepeda Tersedia',
                    'route' => 'bikes.index',
                    'icon' => 'fas fa-bicycle',
                    'active' => request()->routeIs('bikes.*')
                ],
                [
                    'name' => 'Riwayat Sewa',
                    'route' => 'rental.history',
                    'icon' => 'fas fa-history',
                    'active' => request()->routeIs('rental.*')
                ],
                [
                    'name' => 'Pembayaran',
                    'route' => 'payment.index',
                    'icon' => 'fas fa-credit-card',
                    'active' => request()->routeIs('payment.*')
                ],
                [
                    'name' => 'Peta',
                    'route' => 'features.map',
                    'icon' => 'fas fa-map-marker-alt',
                    'active' => request()->routeIs('features.map')
                ],
                [
                    'name' => 'Bantuan',
                    'route' => 'features.help',
                    'icon' => 'fas fa-question-circle',
                    'active' => request()->routeIs('features.help')
                ],
                [
                    'name' => 'Pengaturan',
                    'route' => 'features.settings',
                    'icon' => 'fas fa-cog',
                    'active' => request()->routeIs('features.settings')
                ]
            ]
        ];
    }
}