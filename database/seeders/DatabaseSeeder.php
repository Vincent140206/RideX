<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Bike;
use App\Models\Rental;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create demo users
        $demoUser = User::create([
            'name' => 'Demo User',
            'email' => 'demo@ridex.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
            'address' => 'Jakarta Selatan, DKI Jakarta',
            'balance' => 150000,
            'is_active' => true,
        ]);

        $adminUser = User::create([
            'name' => 'Admin RideX',
            'email' => 'admin@ridex.com', 
            'password' => Hash::make('admin123'),
            'phone' => '081234567891',
            'balance' => 0,
            'is_active' => true,
        ]);

        // Create demo bikes
        $bikes = [
            [
                'code' => 'RX001',
                'name' => 'RideX Electric Pro',
                'type' => 'electric',
                'status' => 'available',
                'battery_level' => 85,
                'location_lat' => -6.200000,
                'location_lng' => 106.816666,
                'location_name' => 'Monas, Jakarta Pusat',
                'price_per_minute' => 500,
                'description' => 'Sepeda listrik premium dengan baterai tahan lama'
            ],
            [
                'code' => 'RX002', 
                'name' => 'RideX City Bike',
                'type' => 'electric',
                'status' => 'available',
                'battery_level' => 92,
                'location_lat' => -6.175110,
                'location_lng' => 106.865036,
                'location_name' => 'Grand Indonesia, Jakarta Pusat',
                'price_per_minute' => 400,
                'description' => 'Sepeda listrik untuk perjalanan kota'
            ],
            [
                'code' => 'RX003',
                'name' => 'RideX Eco',
                'type' => 'electric', 
                'status' => 'available',
                'battery_level' => 78,
                'location_lat' => -6.238270,
                'location_lng' => 106.798603,
                'location_name' => 'Senayan City, Jakarta Selatan',
                'price_per_minute' => 350,
                'description' => 'Sepeda listrik ramah lingkungan'
            ],
            [
                'code' => 'RX004',
                'name' => 'RideX Sport',
                'type' => 'electric',
                'status' => 'charging',
                'battery_level' => 25,
                'location_lat' => -6.195140,
                'location_lng' => 106.823400,
                'location_name' => 'Plaza Indonesia, Jakarta Pusat',
                'price_per_minute' => 600,
                'description' => 'Sepeda listrik untuk aktivitas olahraga'
            ],
            [
                'code' => 'RX005',
                'name' => 'RideX Standard',
                'type' => 'electric',
                'status' => 'maintenance',
                'battery_level' => 0,
                'location_lat' => -6.220000,
                'location_lng' => 106.820000,
                'location_name' => 'Kota Tua, Jakarta Barat',
                'price_per_minute' => 300,
                'description' => 'Sepeda listrik standar untuk penggunaan sehari-hari'
            ]
        ];

        foreach ($bikes as $bikeData) {
            Bike::create($bikeData);
        }

        // Create demo rentals (history)
        $rentals = [
            [
                'user_id' => $demoUser->id,
                'bike_id' => 1,
                'start_time' => now()->subDays(2),
                'end_time' => now()->subDays(2)->addMinutes(45),
                'start_location_lat' => -6.200000,
                'start_location_lng' => 106.816666,
                'end_location_lat' => -6.175110,
                'end_location_lng' => 106.865036,
                'distance' => 5.2,
                'duration' => 45,
                'total_cost' => 22500,
                'status' => 'completed',
                'payment_status' => 'paid'
            ],
            [
                'user_id' => $demoUser->id,
                'bike_id' => 2,
                'start_time' => now()->subDays(5),
                'end_time' => now()->subDays(5)->addMinutes(30),
                'start_location_lat' => -6.175110,
                'start_location_lng' => 106.865036,
                'end_location_lat' => -6.238270,
                'end_location_lng' => 106.798603,
                'distance' => 8.1,
                'duration' => 30,
                'total_cost' => 12000,
                'status' => 'completed',
                'payment_status' => 'paid'
            ]
        ];

        foreach ($rentals as $rentalData) {
            Rental::create($rentalData);
        }

        // Create demo payments
        $payments = [
            [
                'user_id' => $demoUser->id,
                'amount' => 100000,
                'type' => 'credit',
                'status' => 'completed',
                'payment_method' => 'gopay',
                'description' => 'Top up saldo via GoPay',
                'transaction_id' => 'TXN' . time() . '001',
                'processed_at' => now()->subDays(7)
            ],
            [
                'user_id' => $demoUser->id,
                'amount' => 50000,
                'type' => 'credit', 
                'status' => 'completed',
                'payment_method' => 'ovo',
                'description' => 'Top up saldo via OVO',
                'transaction_id' => 'TXN' . time() . '002',
                'processed_at' => now()->subDays(3)
            ],
            [
                'user_id' => $demoUser->id,
                'rental_id' => 1,
                'amount' => 22500,
                'type' => 'debit',
                'status' => 'completed',
                'payment_method' => 'balance',
                'description' => 'Pembayaran sewa sepeda RX001',
                'transaction_id' => 'TXN' . time() . '003',
                'processed_at' => now()->subDays(2)
            ]
        ];

        foreach ($payments as $paymentData) {
            Payment::create($paymentData);
        }

        echo "✅ Database seeded successfully!\n";
        echo "Demo User: demo@ridex.com / password123\n";
        echo "Admin User: admin@ridex.com / admin123\n";
    }
}