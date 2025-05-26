<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes (untuk user yang belum login)
Route::middleware('guest')->group(function () {
    // Halaman utama redirect ke login
    Route::get('/', function () {
        return redirect()->route('login');
    });
    
    // Authentication routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Protected routes (untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard/Beranda
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/beranda', [DashboardController::class, 'index'])->name('beranda');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Bike/Sepeda routes
    Route::prefix('bikes')->name('bikes.')->group(function () {
        Route::get('/', [BikeController::class, 'index'])->name('index');
        Route::get('/{bike}', [BikeController::class, 'show'])->name('show');
        Route::get('/location/nearby', [BikeController::class, 'nearby'])->name('nearby');
    });
    
    // Rental/Peminjaman routes
    Route::prefix('rental')->name('rental.')->group(function () {
        Route::get('/', [RentalController::class, 'index'])->name('index');
        Route::get('/history', [RentalController::class, 'history'])->name('history');
        Route::post('/start/{bike}', [RentalController::class, 'start'])->name('start');
        Route::post('/end/{rental}', [RentalController::class, 'end'])->name('end');
        Route::get('/active', [RentalController::class, 'active'])->name('active');
    });
    
    // Payment routes
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('/topup', [PaymentController::class, 'showTopup'])->name('topup');
        Route::post('/topup', [PaymentController::class, 'processTopup'])->name('topup.process');
        Route::get('/history', [PaymentController::class, 'history'])->name('history');
        Route::get('/balance', [PaymentController::class, 'balance'])->name('balance');
    });
    
    // Additional feature routes
    Route::prefix('features')->name('features.')->group(function () {
        Route::get('/map', function () {
            return view('features.map');
        })->name('map');
        
        Route::get('/help', function () {
            return view('features.help');
        })->name('help');
        
        Route::get('/settings', function () {
            return view('features.settings');
        })->name('settings');
        
        Route::get('/notifications', function () {
            return view('features.notifications');
        })->name('notifications');
    });
});

// API routes untuk mobile app (opsional)
Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('bikes', BikeController::class);
    Route::apiResource('rentals', RentalController::class);
    Route::post('/payment/topup', [PaymentController::class, 'apiTopup']);
});