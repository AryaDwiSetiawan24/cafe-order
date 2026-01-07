@extends('layouts.pegawai')

@section('content')
    <!-- Header with Notification Sound Toggle -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-serif font-bold text-gray-800 mb-2">Dashboard Pegawai</h1>
            <p class="text-gray-600">Kelola pesanan pelanggan dengan cepat dan efisien</p>
        </div>
        <button onclick="toggleNotificationSound()" 
            class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
            <svg id="soundIcon" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
            </svg>
            <span id="soundText" class="text-sm font-medium text-gray-700">Notifikasi: ON</span>
        </button>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1: Pesanan Baru -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-red-100 text-sm font-medium mb-1">Pesanan Baru</p>
                    <p id="pendingCount" class="text-3xl font-bold">3</p>
                </div>
                <div class="bg-white/20 rounded-full p-3 animate-pulse">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="text-sm">
                <span class="bg-white/30 px-2 py-1 rounded text-xs font-semibold">Perlu Segera Diproses</span>
            </div>
        </div>

        <!-- Card 2: Sedang Diproses -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Sedang Diproses</p>
                    <p id="processingCount" class="text-3xl font-bold">5</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="text-sm">
                <span>Dalam antrian dapur</span>
            </div>
        </div>

        <!-- Card 3: Siap Diambil -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-green-100 text-sm font-medium mb-1">Siap Diambil</p>
                    <p id="readyCount" class="text-3xl font-bold">2</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="text-sm">
                <span>Menunggu pelanggan</span>
            </div>
        </div>
    </div>

    <!-- Pesanan Masuk (Real-time) -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="px-6 py-4 bg-red-50 border-b border-red-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-red-500 text-white rounded-full p-2 animate-pulse">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Pesanan Baru Masuk</h2>
                    <p class="text-sm text-gray-600">Segera proses pesanan berikut</p>
                </div>
            </div>
            <button onclick="refreshOrders()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Refresh
            </button>
        </div>

        <div id="pendingOrders" class="divide-y divide-gray-200">
            <!-- Order items will be inserted here -->
        </div>
    </div>

    <!-- Pesanan Dalam Proses -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="px-6 py-4 bg-blue-50 border-b border-blue-200">
            <h2 class="text-xl font-semibold text-gray-800">Pesanan Sedang Diproses</h2>
            <p class="text-sm text-gray-600 mt-1">Pantau progress pesanan yang sedang dikerjakan</p>
        </div>

        <div id="processingOrders" class="divide-y divide-gray-200">
            <!-- Order items will be inserted here -->
        </div>
    </div>

    <!-- Pesanan Siap -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-green-50 border-b border-green-200">
            <h2 class="text-xl font-semibold text-gray-800">Pesanan Siap Diambil</h2>
            <p class="text-sm text-gray-600 mt-1">Pesanan yang sudah siap untuk diserahkan</p>
        </div>

        <div id="readyOrders" class="divide-y divide-gray-200">
            <!-- Order items will be inserted here -->
        </div>
    </div>

    <!-- Order Detail Modal -->
    <div id="orderModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-800">Detail Pesanan</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="p-6">
                <!-- Modal content will be inserted here -->
            </div>
        </div>
    </div>

    <script>
        // Sample data
        let orders = {
            pending: [
                { id: 'ORD001', customer: 'Budi Santoso', time: '10:30 AM', items: ['Espresso x2', 'Nasi Goreng x1', 'Tiramisu x1'], total: 75000, notes: 'Nasi goreng pedas level 3' },
                { id: 'ORD004', customer: 'Dewi Lestari', time: '10:45 AM', items: ['Cappuccino x1', 'Sandwich Club x1'], total: 38000, notes: '' },
                { id: 'ORD007', customer: 'Rina Wijaya', time: '11:00 AM', items: ['Matcha Latte x2', 'Brownies x2'], total: 74000, notes: 'Matcha less sugar' }
            ],
            processing: [
                { id: 'ORD002', customer: 'Sari Dewi', time: '09:45 AM', items: ['Cappuccino x1', 'Tiramisu x1'], total: 40000, notes: '' },
                { id: 'ORD003', customer: 'Andi Wijaya', time: '10:00 AM', items: ['Cafe Latte x2', 'Sandwich x2', 'French Fries x1'], total: 95000, notes: 'Extra sauce untuk sandwich' },
                { id: 'ORD005', customer: 'Ahmad Rizki', time: '10:15 AM', items: ['Thai Tea x1', 'Ayam Geprek x1'], total: 34000, notes: '' },
                { id: 'ORD006', customer: 'Linda Sari', time: '10:25 AM', items: ['Fresh Juice x2', 'Ice Cream Sundae x1'], total: 48000, notes: '' },
                { id: 'ORD008', customer: 'Firman Hadi', time: '10:35 AM', items: ['Espresso x1', 'Cheesecake x1'], total: 37000, notes: '' }
            ],
            ready: [
                { id: 'ORD009', customer: 'Maya Putri', time: '09:30 AM', items: ['Mie Goreng x1', 'Thai Tea x1'], total: 32000, notes: '' },
                { id: 'ORD010', customer: 'Budi Hermawan', time: '09:15 AM', items: ['Spaghetti Carbonara x1', 'Cappuccino x1'], total: 48000, notes: 'Tanpa bawang' }
            ]
        };

        let notificationSound = true;

        // Function to format currency
        function formatCurrency(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }

        // Create order card
        function createOrderCard(order, status) {
            const statusConfig = {
                pending: { bgColor: 'bg-red-50', borderColor: 'border-red-200', btnColor: 'bg-green-600 hover:bg-green-700', btnText: 'Terima & Proses', nextStatus: 'processing' },
                processing: { bgColor: 'bg-blue-50', borderColor: 'border-blue-200', btnColor: 'bg-amber-600 hover:bg-amber-700', btnText: 'Tandai Siap', nextStatus: 'ready' },
                ready: { bgColor: 'bg-green-50', borderColor: 'border-green-200', btnColor: 'bg-gray-600 hover:bg-gray-700', btnText: 'Selesaikan', nextStatus: 'completed' }
            };

            const config = statusConfig[status];
            const itemsList = order.items.slice(0, 2).join(', ') + (order.items.length > 2 ? '...' : '');

            return `
                <div class="p-6 hover:bg-gray-50 transition duration-150 ${config.bgColor} border-l-4 ${config.borderColor}">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-white rounded-lg p-3 shadow">
                                <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h3 class="text-lg font-semibold text-gray-800">${order.id}</h3>
                                    <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded">${order.time}</span>
                                </div>
                                <p class="text-gray-600 font-medium">${order.customer}</p>
                                <p class="text-sm text-gray-500 mt-1">${itemsList}</p>
                                ${order.notes ? `<p class="text-sm text-amber-600 mt-2"><strong>Catatan:</strong> ${order.notes}</p>` : ''}
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-gray-800">${formatCurrency(order.total)}</p>
                            <p class="text-sm text-gray-500">${order.items.length} items</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="updateOrderStatus('${order.id}', '${status}', '${config.nextStatus}')" 
                            class="flex-1 px-4 py-2 ${config.btnColor} text-white rounded-lg font-medium transition duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            ${config.btnText}
                        </button>
                        <button onclick="showOrderDetail('${order.id}', '${status}')" 
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg font-medium transition duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Detail
                        </button>
                    </div>
                </div>
            `;
        }

        // Render orders
        function renderOrders() {
            document.getElementById('pendingOrders').innerHTML = orders.pending.length > 0 
                ? orders.pending.map(order => createOrderCard(order, 'pending')).join('') 
                : '<div class="p-6 text-center text-gray-500">Tidak ada pesanan baru</div>';

            document.getElementById('processingOrders').innerHTML = orders.processing.length > 0 
                ? orders.processing.map(order => createOrderCard(order, 'processing')).join('') 
                : '<div class="p-6 text-center text-gray-500">Tidak ada pesanan dalam proses</div>';

            document.getElementById('readyOrders').innerHTML = orders.ready.length > 0 
                ? orders.ready.map(order => createOrderCard(order, 'ready')).join('') 
                : '<div class="p-6 text-center text-gray-500">Tidak ada pesanan siap</div>';

            // Update counts
            document.getElementById('pendingCount').textContent = orders.pending.length;
            document.getElementById('processingCount').textContent = orders.processing.length;
            document.getElementById('readyCount').textContent = orders.ready.length;
        }

        // Update order status
        function updateOrderStatus(orderId, currentStatus, nextStatus) {
            const order = orders[currentStatus].find(o => o.id === orderId);
            if (!order) return;

            orders[currentStatus] = orders[currentStatus].filter(o => o.id !== orderId);
            
            if (nextStatus !== 'completed') {
                orders[nextStatus].push(order);
            }

            renderOrders();
            playNotificationSound();
        }

        // Show order detail
        function showOrderDetail(orderId, status) {
            const order = orders[status].find(o => o.id === orderId);
            if (!order) return;

            const modalContent = `
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-4 border-b">
                        <div>
                            <h4 class="text-2xl font-bold text-gray-800">${order.id}</h4>
                            <p class="text-gray-600">${order.customer} • ${order.time}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-amber-600">${formatCurrency(order.total)}</p>
                        </div>
                    </div>
                    
                    <div>
                        <h5 class="font-semibold text-gray-800 mb-3">Daftar Item:</h5>
                        <ul class="space-y-2">
                            ${order.items.map(item => `
                                <li class="flex items-center gap-2 p-2 bg-gray-50 rounded">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-gray-700">${item}</span>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                    
                    ${order.notes ? `
                        <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded">
                            <h5 class="font-semibold text-amber-800 mb-2">Catatan Pelanggan:</h5>
                            <p class="text-amber-700">${order.notes}</p>
                        </div>
                    ` : ''}
                </div>
            `;

            document.getElementById('modalContent').innerHTML = modalContent;
            document.getElementById('orderModal').classList.remove('hidden');
        }

        // Close modal
        function closeModal() {
            document.getElementById('orderModal').classList.add('hidden');
        }

        // Toggle notification sound
        function toggleNotificationSound() {
            notificationSound = !notificationSound;
            const icon = document.getElementById('soundIcon');
            const text = document.getElementById('soundText');
            
            if (notificationSound) {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>`;
                text.textContent = 'Notifikasi: ON';
            } else {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path>`;
                text.textContent = 'Notifikasi: OFF';
            }
        }

        // Play notification sound
        function playNotificationSound() {
            if (notificationSound) {
                // Simple beep sound (in production, use an actual audio file)
                const context = new (window.AudioContext || window.webkitAudioContext)();
                const oscillator = context.createOscillator();
                const gainNode = context.createGain();
                
                oscillator.connect(gainNode);
                gainNode.connect(context.destination);
                
                oscillator.frequency.value = 800;
                oscillator.type = 'sine';
                
                gainNode.gain.setValueAtTime(0.3, context.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, context.currentTime + 0.5);
                
                oscillator.start(context.currentTime);
                oscillator.stop(context.currentTime + 0.5);
            }
        }

        // Refresh orders
        function refreshOrders() {
            renderOrders();
            playNotificationSound();
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderOrders();
        });

        // Close modal when clicking outside
        document.getElementById('orderModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection