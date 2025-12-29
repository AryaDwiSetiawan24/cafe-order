<aside class="w-64 bg-gray-900 text-white min-h-screen fixed left-0 top-0 shadow-xl">
    <!-- Logo/Brand -->
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M2 21h19v-3H2v3zM20 8H4V6h16v2zm1.81-5.82C21.05 1.43 20.16 1 19 1H5c-1.16 0-2.05.43-2.81 1.18S1 3.84 1 5v3c0 1.16.43 2.05 1.18 2.81S3.84 12 5 12h14c1.16 0 2.05-.43 2.81-1.18S23 9.16 23 8V5c0-1.16-.43-2.05-1.19-2.82zM20 8H4V5h16v3z"/>
            </svg>
            <div>
                <h1 class="text-xl font-serif font-bold">CafeKu</h1>
                <p class="text-xs text-gray-400">Panel Pegawai</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4 space-y-1">
        <a href="/employee" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition duration-200 {{ request()->is('employee') && !request()->is('employee/*') ? 'bg-amber-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="/employee/orders" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition duration-200 {{ request()->is('employee/orders*') ? 'bg-amber-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="font-medium">Kelola Pesanan</span>
            <span id="orderBadge" class="ml-auto bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">
                3
            </span>
        </a>

        <a href="/employee/notifications" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition duration-200 {{ request()->is('employee/notifications*') ? 'bg-amber-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <span class="font-medium">Notifikasi</span>
            <span id="notifBadge" class="ml-auto bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">
                5
            </span>
        </a>

        <a href="/employee/menu-view" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition duration-200 {{ request()->is('employee/menu-view*') ? 'bg-amber-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span class="font-medium">Lihat Menu</span>
        </a>

        <div class="pt-4 pb-2 px-4">
            <p class="text-xs text-gray-500 uppercase font-semibold">Pengaturan</p>
        </div>

        <a href="/employee/profile" 
           class="flex items-center gap-3 px-4 py-3 rounded-lg transition duration-200 {{ request()->is('employee/profile*') ? 'bg-amber-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="font-medium">Profil</span>
        </a>
    </nav>

    <!-- User Info & Logout -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700">
        <div class="flex items-center gap-3 px-4 py-3 mb-2">
            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center font-bold">
                P
            </div>
            <div class="flex-grow">
                <p class="text-sm font-medium">Pegawai</p>
                <p class="text-xs text-gray-400">pegawai@cafeku.com</p>
            </div>
        </div>
        
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" 
                class="flex items-center gap-3 w-full px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>

    <!-- Sound Toggle (untuk notifikasi) -->
    <script>
        let notificationSound = true;
        
        function toggleNotificationSound() {
            notificationSound = !notificationSound;
            const icon = document.getElementById('soundIcon');
            if (notificationSound) {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>`;
            } else {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path>`;
            }
        }
    </script>
</aside>