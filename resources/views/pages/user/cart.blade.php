@extends('layouts.app')
@section('content')
    <!-- Header Section -->
    <section class="bg-gray-800 text-white py-12 px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-serif font-bold">Keranjang Pesanan</h1>
        </div>
    </section>

    <div class="max-w-4xl mx-auto px-6 py-8">
        <!-- Empty Cart Message -->
        <div id="emptyCart" class="hidden text-center py-16">
            <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Keranjang Kosong</h3>
            <p class="text-gray-600 mb-6">Belum ada item dalam keranjang Anda</p>
            <a href="/menu" class="inline-block px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white rounded-md transition duration-300">
                Lihat Menu
            </a>
        </div>

        <!-- Cart Content -->
        <div id="cartContent" class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Item Pesanan</h3>
                    <div id="cartItems" class="space-y-4">
                        <!-- Cart items will be inserted here -->
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Ringkasan Pesanan</h3>
                    
                    <div class="space-y-3 mb-4 pb-4 border-b">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span id="subtotal">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Pajak (10%)</span>
                            <span id="tax">Rp 0</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between text-lg font-bold text-gray-800 mb-6">
                        <span>Total</span>
                        <span id="total">Rp 0</span>
                    </div>
                    
                    <button onclick="checkout()" 
                        class="w-full py-3 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-md transition duration-300 mb-3">
                        Checkout
                    </button>
                    <a href="/menu" 
                        class="block text-center py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-md transition duration-300">
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample cart data (simulate data from backend)
        let cartItems = [
            { id: 1, name: 'Espresso', price: 15000, quantity: 2, image: 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=200' },
            { id: 2, name: 'Nasi Goreng Special', price: 25000, quantity: 1, image: 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=200' },
            { id: 3, name: 'Tiramisu', price: 25000, quantity: 1, image: 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=200' }
        ];

        // Function to format currency
        function formatCurrency(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }

        // Function to create cart item HTML
        function createCartItemHTML(item) {
            return `
                <div class="flex gap-4 border-b pb-4 last:border-b-0 last:pb-0" id="item-${item.id}">
                    <img src="${item.image}" alt="${item.name}" 
                        class="w-20 h-20 object-cover rounded-md">
                    
                    <div class="flex-grow">
                        <h4 class="font-semibold text-gray-800 mb-1">${item.name}</h4>
                        <p class="text-amber-600 font-semibold mb-2">${formatCurrency(item.price)}</p>
                        
                        <div class="flex items-center gap-3">
                            <div class="flex items-center border rounded-md">
                                <button onclick="updateQuantity(${item.id}, -1)" 
                                    class="px-3 py-1 hover:bg-gray-100 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <span class="px-4 py-1 font-medium" id="qty-${item.id}">${item.quantity}</span>
                                <button onclick="updateQuantity(${item.id}, 1)" 
                                    class="px-3 py-1 hover:bg-gray-100 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                            
                            <button onclick="removeItem(${item.id})" 
                                class="text-red-600 hover:text-red-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <p class="font-semibold text-gray-800" id="total-${item.id}">
                            ${formatCurrency(item.price * item.quantity)}
                        </p>
                    </div>
                </div>
            `;
        }

        // Function to update quantity
        function updateQuantity(itemId, change) {
            const item = cartItems.find(i => i.id === itemId);
            if (!item) return;

            item.quantity += change;

            if (item.quantity <= 0) {
                removeItem(itemId);
                return;
            }

            // Update quantity display
            document.getElementById(`qty-${itemId}`).textContent = item.quantity;
            
            // Update item total
            document.getElementById(`total-${itemId}`).textContent = 
                formatCurrency(item.price * item.quantity);

            // Update summary
            updateSummary();
        }

        // Function to remove item
        function removeItem(itemId) {
            // Remove from array
            cartItems = cartItems.filter(i => i.id !== itemId);

            // Remove from DOM with animation
            const element = document.getElementById(`item-${itemId}`);
            element.style.opacity = '0';
            element.style.transform = 'translateX(-20px)';
            element.style.transition = 'all 0.3s ease';

            setTimeout(() => {
                element.remove();
                
                // Check if cart is empty
                if (cartItems.length === 0) {
                    showEmptyCart();
                } else {
                    updateSummary();
                }
            }, 300);
        }

        // Function to update summary
        function updateSummary() {
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = Math.round(subtotal * 0.1);
            const total = subtotal + tax;

            document.getElementById('subtotal').textContent = formatCurrency(subtotal);
            document.getElementById('tax').textContent = formatCurrency(tax);
            document.getElementById('total').textContent = formatCurrency(total);
        }

        // Function to show empty cart
        function showEmptyCart() {
            document.getElementById('cartContent').classList.add('hidden');
            document.getElementById('emptyCart').classList.remove('hidden');
        }

        // Function to render cart
        function renderCart() {
            const cartItemsContainer = document.getElementById('cartItems');

            if (cartItems.length === 0) {
                showEmptyCart();
                return;
            }

            cartItemsContainer.innerHTML = cartItems.map(item => createCartItemHTML(item)).join('');
            updateSummary();
        }

        // Function to checkout
        function checkout() {
            if (cartItems.length === 0) {
                alert('Keranjang Anda kosong!');
                return;
            }

            // Show confirmation
            const total = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = Math.round(total * 0.1);
            const grandTotal = total + tax;

            if (confirm(`Lanjutkan checkout dengan total ${formatCurrency(grandTotal)}?`)) {
                alert('Pesanan berhasil! Terima kasih telah memesan di CafeKu.');
                // Clear cart
                cartItems = [];
                renderCart();
            }
        }

        // Initialize cart on page load
        document.addEventListener('DOMContentLoaded', function() {
            renderCart();
        });
    </script>
@endsection