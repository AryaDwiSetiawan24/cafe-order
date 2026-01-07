<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // contoh fillable fields
    protected $fillable = [
        'customer_name',
        'total_price',
        'payment_status'
    ];
}
