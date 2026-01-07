<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Ku</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-amber-50">
    <!-- Navigation -->
    <nav class="bg-zinc-900 text-white px-8 py-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="text-2xl font-display font-bold">Cafe Ku</div>
            <div class="hidden md:flex space-x-8 text-sm">
                <a href="#home" class="hover:text-amber-400 transition">Home</a>
                <a href="#about" class="hover:text-amber-400 transition">About Us</a>
                <a href="#menu" class="hover:text-amber-400 transition">Menu</a>
                <a href="#contact" class="hover:text-amber-400 transition">Contact</a>
            </div>
            <button class="text-xl">🔍</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="bg-zinc-900 text-white py-20 px-8">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="font-display text-6xl font-bold mb-6 leading-tight">
                    Discover The<br>Art Of Perfect<br>Coffee
                </h1>
                <p class="text-gray-300 mb-8 text-lg">
                    Nikmati pengalaman kopi yang sempurna dengan biji pilihan terbaik dan barista profesional kami.
                </p>
                <div class="flex gap-4">
                    <button class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                        Order Now
                    </button>
                    <button class="border border-white hover:bg-white hover:text-zinc-900 px-8 py-3 rounded-lg font-semibold transition">
                        Learn More
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-8 mt-12">
                    <div>
                        <div class="text-3xl font-bold">250+</div>
                        <div class="text-gray-400 text-sm">Customers</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">35+</div>
                        <div class="text-gray-400 text-sm">Menu Items</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">4.9★</div>
                        <div class="text-gray-400 text-sm">Rating</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?w=600&h=700&fit=crop" alt="Coffee" class="rounded-lg shadow-2xl">
            </div>
        </div>
    </section>

    <!-- Menu Cards Section -->
    <section id="menu" class="py-20 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-amber-100 p-6 rounded-lg">
                    <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=300&h=200&fit=crop" alt="Coffee Bean" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="font-display text-2xl font-bold mb-2">Coffee Bean</h3>
                    <p class="text-gray-700 mb-4">Premium quality beans from the finest plantations</p>
                    <button class="text-amber-800 font-semibold hover:underline">Explore →</button>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg">
                    <img src="https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=300&h=200&fit=crop" alt="Americano" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="font-display text-2xl font-bold mb-2">Americano</h3>
                    <p class="text-gray-700 mb-4">Bold and smooth classic espresso coffee</p>
                    <button class="text-blue-800 font-semibold hover:underline">Explore →</button>
                </div>
                <div class="bg-orange-100 p-6 rounded-lg">
                    <img src="https://images.unsplash.com/photo-1510707577719-ae7c14805e3a?w=300&h=200&fit=crop" alt="Espresso" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="font-display text-2xl font-bold mb-2">Espresso</h3>
                    <p class="text-gray-700 mb-4">Rich and intense coffee shot perfection</p>
                    <button class="text-orange-800 font-semibold hover:underline">Explore →</button>
                </div>
            </div>

            <!-- Featured Section -->
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1511537190424-bbbab87ac5eb?w=500&h=600&fit=crop" alt="Coffee Heaven" class="rounded-lg shadow-xl">
                </div>
                <div>
                    <h2 class="font-display text-5xl font-bold mb-6">Coffee Heaven</h2>
                    <p class="text-gray-700 mb-6 text-lg">
                        Setiap cangkir kopi kami adalah karya seni yang dibuat dengan penuh dedikasi.
                        Kami menggunakan biji kopi pilihan dari perkebunan terbaik di seluruh dunia,
                        diolah dengan teknik modern dan sentuhan tradisional.
                    </p>
                    <button class="bg-zinc-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-zinc-800 transition">
                        Read More
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Says Section -->
    <section class="bg-zinc-900 text-white py-20 px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-display text-4xl font-bold mb-12 text-center">What Our Customers Says</h2>
            <div class="bg-zinc-800 p-8 rounded-lg max-w-3xl mx-auto">
                <div class="flex items-center gap-4 mb-6">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" alt="Customer" class="w-16 h-16 rounded-full">
                    <div>
                        <div class="font-semibold">Ahmad Rizki</div>
                        <div class="text-gray-400 text-sm">Regular Customer</div>
                    </div>
                </div>
                <p class="text-gray-300 mb-4 italic">
                    "Kopi terbaik yang pernah saya coba! Aromanya luar biasa dan rasanya sempurna.
                    Pelayanan yang ramah dan suasana cafe yang nyaman membuat saya selalu kembali lagi."
                </p>
                <div class="text-amber-400 text-xl">★★★★★</div>
            </div>
        </div>
    </section>

    <!-- Special Offer Section -->
    <section class="py-20 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-gradient-to-r from-amber-600 to-orange-700 text-white p-12 rounded-2xl">
                <div class="max-w-2xl">
                    <h2 class="font-display text-4xl font-bold mb-4">Try Our Special Offers</h2>
                    <p class="mb-6 text-lg">Dapatkan diskon 20% untuk pembelian pertama Anda!</p>
                    <button class="bg-white text-amber-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Claim Offer →
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-zinc-900 text-white py-20 px-8">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="font-display text-4xl font-bold mb-6">Contact Us</h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                Kunjungi kami atau hubungi untuk pemesanan dan informasi lebih lanjut
            </p>
            <div class="grid md:grid-cols-3 gap-8 text-left max-w-4xl mx-auto">
                <div>
                    <div class="text-amber-400 text-2xl mb-2">📍</div>
                    <h3 class="font-semibold mb-2">Location</h3>
                    <p class="text-gray-400">Jl. Kopi Nikmat No. 123<br>Demak, Jawa Tengah</p>
                </div>
                <div>
                    <div class="text-amber-400 text-2xl mb-2">📞</div>
                    <h3 class="font-semibold mb-2">Phone</h3>
                    <p class="text-gray-400">+62 812-3456-7890<br>Open Daily 8AM - 10PM</p>
                </div>
                <div>
                    <div class="text-amber-400 text-2xl mb-2">✉️</div>
                    <h3 class="font-semibold mb-2">Email</h3>
                    <p class="text-gray-400">hello@cafeku.com<br>support@cafeku.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 py-8 px-8 text-center">
        <div class="max-w-7xl mx-auto">
            <div class="font-display text-2xl font-bold text-white mb-4">Cafe Ku</div>
            <p>&copy; 2025 Cafe Ku. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
