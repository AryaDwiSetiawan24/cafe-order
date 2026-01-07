<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_number',
        'capacity',
        'qr_code',
        'is_active',
    ];

    protected $casts = [
        'capacity' => 'integer',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'table_number', 'table_number');
    }

    // Accessor untuk QR code URL
    public function getQrCodeUrlAttribute()
    {
        if ($this->qr_code) {
            return asset('storage/' . $this->qr_code);
        }
        return null;
    }

    // Helper method untuk generate URL order
    public function getOrderUrlAttribute()
    {
        return url('/order?table=' . $this->table_number);
    }

    // Scope
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        // Meja yang tidak sedang ada order pending/confirmed/preparing
        return $query->whereDoesntHave('orders', function ($q) {
            $q->whereIn('order_status', ['pending', 'confirmed', 'preparing']);
        });
    }
}
