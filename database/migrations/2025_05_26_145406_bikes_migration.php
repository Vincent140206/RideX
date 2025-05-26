<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode unik sepeda (QR Code)
            $table->string('name'); // Nama/model sepeda
            $table->enum('type', ['electric', 'regular'])->default('electric');
            $table->enum('status', ['available', 'in_use', 'maintenance', 'charging'])->default('available');
            $table->integer('battery_level')->default(100); // Persentase baterai
            $table->decimal('location_lat', 10, 8); // Latitude lokasi
            $table->decimal('location_lng', 11, 8); // Longitude lokasi
            $table->string('location_name')->nullable(); // Nama lokasi (optional)
            $table->decimal('price_per_minute', 8, 2)->default(500); // Harga per menit
            $table->string('image')->nullable(); // Foto sepeda
            $table->text('description')->nullable(); // Deskripsi sepeda
            $table->timestamp('last_maintenance')->nullable(); // Terakhir maintenance
            $table->integer('total_rides')->default(0); // Total kali disewa
            $table->decimal('total_distance', 10, 2)->default(0); // Total jarak tempuh
            $table->timestamps();
            
            // Indexes
            $table->index(['status', 'battery_level']);
            $table->index(['location_lat', 'location_lng']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};