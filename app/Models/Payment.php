<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'status',
        'payment_method',
        'description',
        'transaction_id',
        'processed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'processed_at' => 'datetime',
    ];

    /**
     * Relationship dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk filter berdasarkan type
     */
    public function scopeCredit($query)
    {
        return $query->where('type', 'credit');
    }

    public function scopeDebit($query)
    {
        return $query->where('type', 'debit');
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Accessor untuk format amount
     */
    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    /**
     * Accessor untuk status badge
     */
    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case 'completed':
                return '<span class="badge badge-success">Berhasil</span>';
            case 'pending':
                return '<span class="badge badge-warning">Pending</span>';
            case 'failed':
                return '<span class="badge badge-danger">Gagal</span>';
            default:
                return '<span class="badge badge-secondary">Unknown</span>';
        }
    }

    /**
     * Accessor untuk type badge
     */
    public function getTypeBadgeAttribute()
    {
        switch ($this->type) {
            case 'credit':
                return '<span class="badge badge-success">Top Up</span>';
            case 'debit':
                return '<span class="badge badge-danger">Pembayaran</span>';
            default:
                return '<span class="badge badge-secondary">Unknown</span>';
        }
    }
}