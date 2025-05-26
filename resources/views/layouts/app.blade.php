<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RideX') }} - @yield('title', 'Peminjaman Sepeda Listrik')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }
        
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
        }
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-color) 0%, #1e40af 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white;
            transform: translateX(5px);
        }
        
        .main-content {
            min-height: 100vh;
            padding: 0;
        }
        
        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 30px;
        }
        
        .profile-dropdown .dropdown-toggle::after {
            display: none;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -100%;
                position: fixed;
                z-index: 1000;
                width: 250px;
                transition: margin-left 0.3s ease;
            }
            
            .sidebar.show {
                margin-left: 0;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebar">
                <div class="position-sticky pt-3">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <h3 class="text-white fw-bold">
                            <i class="fas fa-bicycle me-2"></i>RideX
                        </h3>
                        <small class="text-light opacity-75">Sepeda Listrik</small>
                    </div>
                    
                    <!-- Navigation Menu -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-home me-2"></i>
                                Beranda
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bikes.*') ? 'active' : '' }}" href="{{ route('bikes.index') }}">
                                <i class="fas fa-bicycle me-2"></i>
                                Sepeda Tersedia
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('rental.*') ? 'active' : '' }}" href="{{ route('rental.history') }}">
                                <i class="fas fa-history me-2"></i>
                                Riwayat Sewa
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('payment.*') ? 'active' : '' }}" href="{{ route('payment.index') }}">
                                <i class="fas fa-credit-card me-2"></i>
                                Pembayaran
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('features.map') ? 'active' : '' }}" href="{{ route('features.map') }}">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                Peta Sepeda
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('features.help') ? 'active' : '' }}" href="{{ route('features.help') }}">
                                <i class="fas fa-question-circle me-2"></i>
                                Bantuan
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('features.settings') ? 'active' : '' }}" href="{{ route('features.settings') }}">
                                <i class="fas fa-cog me-2"></i>
                                Pengaturan
                            </a>
                        </li>
                    </ul>
                    
                    <!-- User Balance -->
                    <div class="mt-4 mx-3">
                        <div class="card bg-light bg-opacity-10 border-0">
                            <div class="card-body text-center text-white">
                                <small class="opacity-75">Sal