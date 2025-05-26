<?php

// Model Bike
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'type',
        'status',
        'battery_level',
        'location_lat',
        'location_lng',
        'location_name',
        'price_per_minute',
        'image',
        'description',
    ];

    protected $casts = [
        'battery_level' => 'integer',
        'location_lat' => 'decimal:8',
        'location_lng' => 'decimal:8',
        'price_per_minute' => 'decimal:2',
    ];

    /**
     * Relationship dengan Rental
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    /**
     * Get active rental for this bike
     */
    public function activeRental()
    {
        return $this->hasOne(Rental::class)->where('status', 'active');
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeInUse($query)
    {
        return $query->where('status', 'in_use');
    }

    /**
     * Accessor untuk status badge
     */
    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case 'available':
                return '<span class="badge badge-success">Tersedia</span>';
            case 'in_use':
                return '<span class="badge badge-warning">Sedang Digunakan</span>';
            case 'maintenance':
                return '<span class="badge badge-danger">Maintenance</span>';
            case 'charging':
                return '<span class="badge badge-info">Charging</span>';
            default:
                return '<span class="badge badge-secondary">Unknown</span>';
        }
    }

    /**
     * Accessor untuk battery level badge
     */
    public function getBatteryBadgeAttribute()
    {
        if ($this->battery_level >= 70) {
            return '<span class="badge badge-success">' . $this->battery_level . '%</span>';
        } elseif ($this->battery_level >= 30) {
            return '<span class="badge badge-warning">' . $this->battery_level . '%</span>';
        } else {
            return '<span class="badge badge-danger">' . $this->battery_level . '%</span>';
        }
    }

    /**
     * Accessor untuk formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_minute, 0, ',', '.') . '/menit';
    }

    /**
     * Check if bike is available for rent
     */
    public function isAvailable()
    {
        return $this->status === 'available' && $this->battery_level > 20;
    }
}

// Model Rental
class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bike_id',
        'start_time',
        'end_time',
        'start_location_lat',
        'start_location_lng',
        'end_location_lat',
        'end_location_lng',
        'distance',
        'duration',
        'total_cost',
        'status',
        'payment_status',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'start_location_lat' => 'decimal:8',
        'start_location_lng' => 'decimal:8',
        'end_location_lat' => 'decimal:8',
        'end_location_lng' => 'decimal:8',
        'distance' => 'decimal:2',
        'duration' => 'integer',
        'total_cost' => 'decimal:2',
    ];

    /**
     * Relationship dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship dengan Bike
     */
    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Accessor untuk status badge
     */
    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case 'active':
                return '<span class="badge badge-primary">Sedang Berlangsung</span>';
            case 'completed':
                return '<span class="badge badge-success">Selesai</span>';
            case 'cancelled':
                return '<span class="badge badge-danger">Dibatalkan</span>';
            default:
                return '<span class="badge badge-secondary">Unknown</span>';
        }
    }

    /**
     * Accessor untuk formatted cost
     */
    public function getFormattedCostAttribute()
    {
        return 'Rp ' . number_format($this->total_cost, 0, ',', '.');
    }

    /**
     * Accessor untuk formatted duration
     */
    public function getFormattedDurationAttribute()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;
        
        if ($hours > 0) {
            return $hours . ' jam ' . $minutes . ' menit';
        } else {
            return $minutes . ' menit';
        }
    }

    /**
     * Accessor untuk formatted distance
     */
    public function getFormattedDistanceAttribute()
    {
        if ($this->distance >= 1) {
            return number_format($this->distance, 1) . ' km';
        } else {
            return number_format($this->distance * 1000, 0) . ' m';
        }
    }

    /**
     * Calculate total cost based on duration and bike price
     */
    public function calculateCost()
    {
        if ($this->bike && $this->duration) {
            return $this->duration * $this->bike->price_per_minute;
        }
        return 0;
    }
}