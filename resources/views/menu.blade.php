@extends('layouts.app')
@section('content')
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Menu</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($menus as $menu)
                <div class="border rounded-lg shadow bg-white">
                    <img src="{{ $menu->image }}" class="rounded-t-lg h-40 w-full object-cover">
                    <div class="p-4">
                        <h4 class="font-semibold">{{ $menu->name }}</h4>
                        <p class="text-sm text-gray-500 mb-2">Rp {{ number_format($menu->price) }}</p>
                        <form action="/cart/add/{{ $menu->id }}" method="POST">@csrf
                            <button class="w-full py-2 bg-yellow-500 text-white rounded mt-2">Tambah</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
