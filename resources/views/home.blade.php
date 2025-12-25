@extends('layouts.app')
@section('content')
    <section class="h-[300px] bg-cover bg-center flex items-center px-10 text-white"
        style="background-image:url('https://images.unsplash.com/photo-1504754524776-8f4f37790ca0');">
        <div>
            <h1 class="text-4xl font-bold mb-2">Selamat Datang di CafeKu</h1>
            <p class="text-lg mb-4">Pesan kopi favoritmu dengan cepat dan mudah.</p>
            <a href="/menu" class="px-6 py-3 bg-yellow-500 rounded shadow">Order Sekarang</a>
        </div>
    </section>
@endsection
