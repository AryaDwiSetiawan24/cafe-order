@extends('layouts.app')
@section('content')
    <!-- Header Section -->
    <section class="bg-gray-800 text-white py-16 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-serif font-bold mb-4">Menu Kami</h1>
            <p class="text-lg text-gray-300">Pilihan hidangan terbaik untuk setiap momen</p>
        </div>
    </section>

    <!-- Category Navigation - Fixed (below navbar) -->
    <div id="categoryNav" class="bg-white shadow-md sticky top-16 z-40 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex justify-center gap-4 flex-wrap">
                <button onclick="scrollToCategory('makanan')" 
                    class="category-btn px-6 py-2 rounded-full font-medium transition duration-300 bg-gray-100 hover:bg-amber-600 hover:text-white">
                    Makanan
                </button>
                <button onclick="scrollToCategory('minuman')" 
                    class="category-btn px-6 py-2 rounded-full font-medium transition duration-300 bg-gray-100 hover:bg-amber-600 hover:text-white">
                    Minuman
                </button>
                <button onclick="scrollToCategory('dessert')" 
                    class="category-btn px-6 py-2 rounded-full font-medium transition duration-300 bg-gray-100 hover:bg-amber-600 hover:text-white">
                    Dessert
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-12">
        <!-- Makanan Section -->
        <section id="makanan" class="mb-16 scroll-mt-40">
            <div class="flex items-center mb-8">
                <div class="flex-grow border-t border-gray-300"></div>
                <h2 class="text-3xl font-serif font-bold mx-6 text-gray-800">Makanan</h2>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>
            
            <div id="makananGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Menu items will be inserted here by JavaScript -->
            </div>
        </section>

        <!-- Minuman Section -->
        <section id="minuman" class="mb-16 scroll-mt-40">
            <div class="flex items-center mb-8">
                <div class="flex-grow border-t border-gray-300"></div>
                <h2 class="text-3xl font-serif font-bold mx-6 text-gray-800">Minuman</h2>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>
            
            <div id="minumanGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Menu items will be inserted here by JavaScript -->
            </div>
        </section>

        <!-- Dessert Section -->
        <section id="dessert" class="mb-16 scroll-mt-40">
            <div class="flex items-center mb-8">
                <div class="flex-grow border-t border-gray-300"></div>
                <h2 class="text-3xl font-serif font-bold mx-6 text-gray-800">Dessert</h2>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>
            
            <div id="dessertGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Menu items will be inserted here by JavaScript -->
            </div>
        </section>
    </div>

    <script>
        // Sample menu data
        const menuData = {
            makanan: [
                { id: 1, name: 'Nasi Goreng Special', price: 25000, image: 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=400' },
                { id: 2, name: 'Mie Goreng', price: 20000, image: 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=400' },
                { id: 3, name: 'Ayam Geprek', price: 22000, image: 'https://images.unsplash.com/photo-1690519315565-c31ce99f8d58?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' },
                { id: 4, name: 'Spaghetti Carbonara', price: 30000, image: 'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=400' },
                { id: 5, name: 'Sandwich Club', price: 18000, image: 'https://images.unsplash.com/photo-1528735602780-2552fd46c7af?w=400' },
                { id: 6, name: 'French Fries', price: 15000, image: 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=400' }
            ],
            minuman: [
                { id: 7, name: 'Espresso', price: 15000, image: 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=400' },
                { id: 8, name: 'Cappuccino', price: 18000, image: 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400' },
                { id: 9, name: 'Cafe Latte', price: 20000, image: 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400' },
                { id: 10, name: 'Matcha Latte', price: 22000, image: 'https://plus.unsplash.com/premium_photo-1695151556198-6b21eae6215d?q=80&w=483&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' },
                { id: 11, name: 'Thai Tea', price: 12000, image: 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400' },
                { id: 12, name: 'Fresh Juice', price: 15000, image: 'https://images.unsplash.com/photo-1600271886742-f049cd451bba?w=400' }
            ],
            dessert: [
                { id: 13, name: 'Tiramisu', price: 25000, image: 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400' },
                { id: 14, name: 'Chocolate Lava', price: 28000, image: 'https://images.unsplash.com/photo-1624353365286-3f8d62daad51?w=400' },
                { id: 15, name: 'Cheesecake', price: 22000, image: 'https://images.unsplash.com/photo-1524351199678-941a58a3df50?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' },
                { id: 16, name: 'Ice Cream Sundae', price: 18000, image: 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=400' },
                { id: 17, name: 'Brownies', price: 15000, image: 'https://images.unsplash.com/photo-1607920591413-4ec007e70023?w=400' },
                { id: 18, name: 'Pudding', price: 12000, image: 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400' }
            ]
        };

        // Function to create menu card
        function createMenuCard(item) {
            return `
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <div class="relative overflow-hidden h-48">
                        <img src="${item.image}" 
                             alt="${item.name}" 
                             class="w-full h-full object-cover transition duration-300 hover:scale-110">
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg text-gray-800 mb-2">${item.name}</h4>
                        <p class="text-amber-600 font-bold text-xl mb-4">Rp ${item.price.toLocaleString('id-ID')}</p>
                        <form>
                            @csrf
                            <input type="hidden" name="menu_id" value="${item.id}">
                            <button 
                                class="w-full py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-md font-medium transition duration-300">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            `;
        }

        // Function to render menu items
        function renderMenuItems() {
            const makananGrid = document.getElementById('makananGrid');
            const minumanGrid = document.getElementById('minumanGrid');
            const dessertGrid = document.getElementById('dessertGrid');

            makananGrid.innerHTML = menuData.makanan.map(item => createMenuCard(item)).join('');
            minumanGrid.innerHTML = menuData.minuman.map(item => createMenuCard(item)).join('');
            dessertGrid.innerHTML = menuData.dessert.map(item => createMenuCard(item)).join('');
        }

        // Smooth scroll to category
        function scrollToCategory(category) {
            const element = document.getElementById(category);
            const navbarHeight = 64; // navbar height (h-16 = 64px)
            const categoryNavHeight = document.getElementById('categoryNav').offsetHeight;
            const totalOffset = navbarHeight + categoryNavHeight + 20; // 20px extra padding
            const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = elementPosition - totalOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });

            // Update active button
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('bg-amber-600', 'text-white');
                btn.classList.add('bg-gray-100');
            });
            event.target.classList.remove('bg-gray-100');
            event.target.classList.add('bg-amber-600', 'text-white');
        }

        // Add shadow to navigation on scroll
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('categoryNav');
            if (window.scrollY > 100) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // Initialize menu on page load
        document.addEventListener('DOMContentLoaded', function() {
            renderMenuItems();
        });
    </script>
@endsection