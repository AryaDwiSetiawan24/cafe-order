<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;

class OrderController extends Controller
{
    public function cart()
    {
        return view('pages/user/cart');
    }

    // TAMPILKAN HALAMAN CHECKOUT
    public function checkout()
    {
        // contoh order dummy (biasanya dari cart)
        return view('pages/user/checkout', [
            'total' => 10000
        ]);
    }

    // GENERATE SNAP TOKEN
    public function pay(Request $request)
    {
        // 1. SIMPAN ORDER KE DATABASE
        $order = Order::create([
            'customer_name' => 'Demo User',
            'total_price' => 10000,
            'payment_status' => 'pending',
        ]);

        // 2. KONFIGURASI MIDTRANS
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // 3. PARAMETER TRANSAKSI
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
            ],
        ];

        // 4. GENERATE TOKEN
        $snapToken = Snap::getSnapToken($params);

        return view('pages/user/payment', compact('snapToken', 'order'));
    }

    // CALLBACK MIDTRANS
    public function callback(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $orderId = str_replace('ORDER-', '', $notif->order_id);
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if (in_array($notif->transaction_status, ['settlement', 'capture'])) {
            $order->payment_status = 'paid';
        } elseif ($notif->transaction_status === 'pending') {
            $order->payment_status = 'pending';
        } else {
            $order->payment_status = 'failed';
        }

        $order->save();

        return response()->json(['status' => 'ok']);
    }
}
