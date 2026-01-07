<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 group">
                <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M2 21h19v-3H2v3zM20 8H4V6h16v2zm1.81-5.82C21.05 1.43 20.16 1 19 1H5c-1.16 0-2.05.43-2.81 1.18S1 3.84 1 5v3c0 1.16.43 2.05 1.18 2.81S3.84 12 5 12h14c1.16 0 2.05-.43 2.81-1.18S23 9.16 23 8V5c0-1.16-.43-2.05-1.19-2.82zM20 8H4V5h16v3z"/>
                </svg>
                <span class="font-serif text-2xl font-bold text-gray-800 group-hover:text-amber-600 transition duration-300">
                    CafeKu
                </span>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-8">
                <li>
                    <a href="/" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300 {{ request()->is('/') ? 'text-amber-600' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/menu" class="text-gray-700 hover:text-amber-600 font-medium transition duration-300 {{ request()->is('menu') ? 'text-amber-600' : '' }}">
                        Menu
                    </a>
                </li>
                <li>
                    <a href="/cart" class="relative text-gray-700 hover:text-amber-600 font-medium transition duration-300 {{ request()->is('cart') ? 'text-amber-600' : '' }}">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Keranjang
                        </span>
                        <!-- Cart Badge -->
                        <span id="cartBadge" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center hidden">
                            3
                        </span>
                    </a>
                </li>
            </ul>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-700 hover:text-amber-600 transition duration-300">
                <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-gray-200">
            <ul class="py-4 space-y-3">
                <li>
                    <a href="/" class="block py-2 text-gray-700 hover:text-amber-600 hover:bg-amber-50 px-4 rounded transition duration-300 {{ request()->is('/') ? 'text-amber-600 bg-amber-50' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/menu" class="block py-2 text-gray-700 hover:text-amber-600 hover:bg-amber-50 px-4 rounded transition duration-300 {{ request()->is('menu') ? 'text-amber-600 bg-amber-50' : '' }}">
                        Menu
                    </a>
                </li>
                <li>
                    <a href="/cart" class="block py-2 text-gray-700 hover:text-amber-600 hover:bg-amber-50 px-4 rounded transition duration-300 {{ request()->is('cart') ? 'text-amber-600 bg-amber-50' : '' }}">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Keranjang
                            <span id="cartBadgeMobile" class="bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5 hidden">
                                3
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');

    mobileMenuBtn.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // Show cart badge if there are items (example)
    function updateCartBadge(count) {
        const badge = document.getElementById('cartBadge');
        const badgeMobile = document.getElementById('cartBadgeMobile');
        
        if (count > 0) {
            badge.textContent = count;
            badge.classList.remove('hidden');
            badgeMobile.textContent = count;
            badgeMobile.classList.remove('hidden');
        } else {
            badge.classList.add('hidden');
            badgeMobile.classList.add('hidden');
        }
    }

    // Example: Show badge with 3 items
    // updateCartBadge(3);

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.querySelector('nav');
        if (!nav.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Add scroll effect to navbar
    let lastScroll = 0;
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        const currentScroll = window.pageYOffset;

        if (currentScroll > 50) {
            nav.classList.add('shadow-lg');
        } else {
            nav.classList.remove('shadow-lg');
        }

        lastScroll = currentScroll;
    });
</script>