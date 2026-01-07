<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'table_number',
        'customer_phone',
        'subtotal',
        'tax',
        'total_price',
        'payment_method',
        'payment_status',
        'order_status',
        'midtrans_order_id',
        'midtrans_transaction_id',
        'midtrans_snap_token',
        'paid_at',
        'created_by',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'integer',
        'tax' => 'integer',
        'total_price' => 'integer',
        'paid_at' => 'datetime',
    ];

    // Relationships
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_number', 'table_number');
    }

    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class);
    }

    // Auto generate order number
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = self::generateOrderNumber();
            }
        });
    }

    // Helper method generate order number
    public static function generateOrderNumber()
    {
        $date = date('Ymd');
        $count = self::whereDate('created_at', today())->count() + 1;
        return 'ORD-' . $date . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
    }

    // Accessor untuk format harga
    public function getFormattedSubtotalAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }

    public function getFormattedTaxAttribute()
    {
        return 'Rp ' . number_format($this->tax, 0, ',', '.');
    }

    public function getFormattedTotalPriceAttribute()
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    // Helper methods untuk status
    public function isPending()
    {
        return $this->payment_status === 'pending';
    }

    public function isPaid()
    {
        return $this->payment_status === 'paid';
    }

    public function isCompleted()
    {
        return $this->order_status === 'completed';
    }

    public function isCancelled()
    {
        return $this->order_status === 'cancelled';
    }

    // Method untuk update status
    public function markAsPaid($paymentMethod = null)
    {
        $this->update([
            'payment_status' => 'paid',
            'payment_method' => $paymentMethod ?? $this->payment_method,
            'paid_at' => now(),
        ]);
    }

    public function markAsConfirmed()
    {
        $this->update(['order_status' => 'confirmed']);
    }

    public function markAsPreparing()
    {
        $this->update(['order_status' => 'preparing']);
    }

    public function markAsReady()
    {
        $this->update(['order_status' => 'ready']);
    }

    public function markAsCompleted()
    {
        $this->update(['order_status' => 'completed']);
    }

    public function markAsCancelled()
    {
        $this->update(['order_status' => 'cancelled']);
    }

    // Scope
    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    public function scopeActive($query)
    {
        return $query->whereIn('order_status', ['pending', 'confirmed', 'preparing', 'ready']);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeByTable($query, $tableNumber)
    {
        return $query->where('table_number', $tableNumber);
    }
}
