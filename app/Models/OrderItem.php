<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_id',
        'menu_name',
        'price',
        'qty',
        'subtotal',
        'notes',
    ];

    protected $casts = [
        'price' => 'integer',
        'qty' => 'integer',
        'subtotal' => 'integer',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    // Auto calculate subtotal
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderItem) {
            if (empty($orderItem->subtotal)) {
                $orderItem->subtotal = $orderItem->price * $orderItem->qty;
            }

            // Snapshot menu name
            if (empty($orderItem->menu_name) && $orderItem->menu) {
                $orderItem->menu_name = $orderItem->menu->name;
            }
        });

        static::updating(function ($orderItem) {
            if ($orderItem->isDirty(['price', 'qty'])) {
                $orderItem->subtotal = $orderItem->price * $orderItem->qty;
            }
        });
    }

    // Accessor untuk format harga
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedSubtotalAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }
}
