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
        Schema::table('users', function (Blueprint $table) {
            // Add new columns for RideX app
            $table->string('phone')->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->date('birth_date')->nullable()->after('address');
            $table->enum('gender', ['male', 'female'])->nullable()->after('birth_date');
            $table->string('avatar')->nullable()->after('gender');
            $table->decimal('balance', 10, 2)->default(0)->after('avatar');
            $table->timestamp('last_login')->nullable()->after('balance');
            $table->boolean('is_active')->default(true)->after('last_login');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'address', 
                'birth_date',
                'gender',
                'avatar',
                'balance',
                'last_login',
                'is_active'
            ]);
        });
    }
};