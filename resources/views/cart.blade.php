@extends('layouts.app')
@section('content')
    <div class="p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Keranjang Pesanan</h2>


        <div class="bg-white p-4 shadow rounded">
            @foreach ($cart as $item)
                <div class="flex justify-between border-b py-2">
                    <div>
                        <p class="font-semibold">{{ $item->name }}</p>
                        <p class="text-sm">Qty: {{ $item->qty }}</p>
                    </div>
                    <p>Rp {{ number_format($item->price * $item->qty) }}</p>
                </div>
            @endforeach


            <div class="text-right font-bold text-lg mt-4">
                Total: Rp {{ number_format($total) }}
            </div>


            <a href="/checkout" class="block text-center mt-4 py-2 bg-yellow-600 text-white rounded">Checkout</a>
        </div>
    </div>
@endsection
