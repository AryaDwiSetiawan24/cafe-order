@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center" 
        style="background-image:url('https://images.unsplash.com/photo-1504754524776-8f4f37790ca0');">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <!-- Content -->
        <div class="relative h-full flex items-center justify-center px-6">
            <div class="text-center text-white max-w-3xl">
                <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6 tracking-wide">
                    Selamat Datang di CafeKu
                </h1>
                <p class="text-xl md:text-2xl mb-8 font-light opacity-90">
                    Nikmati pengalaman kuliner terbaik dengan hidangan istimewa kami
                </p>
                <a href="/menu" 
                   class="inline-block px-8 py-4 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-sm transition duration-300 shadow-lg">
                    Lihat Menu
                </a>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-center mb-16 text-gray-800">
                Kenapa Memilih Kami
            </h2>
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-6 bg-amber-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Cepat & Mudah</h3>
                    <p class="text-gray-600 leading-relaxed">Pesan dalam hitungan menit dengan sistem yang simpel</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-6 bg-amber-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Kualitas Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Bahan premium dengan cita rasa autentik</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-6 bg-amber-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Pelayanan Ramah</h3>
                    <p class="text-gray-600 leading-relaxed">Tim kami siap melayani dengan sepenuh hati</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-bold mb-6 text-gray-800">
                Siap Memesan?
            </h2>
            <p class="text-lg text-gray-600 mb-8">
                Jelajahi menu lengkap kami dan temukan hidangan favoritmu
            </p>
            <a href="/menu" 
               class="inline-block px-8 py-4 bg-gray-800 hover:bg-gray-900 text-white font-medium rounded-sm transition duration-300 shadow-lg">
                Pesan Sekarang
            </a>
        </div>
    </section>
@endsection