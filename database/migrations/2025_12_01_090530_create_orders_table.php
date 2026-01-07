<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // ⭐ TAMBAHAN: order number yang user-friendly (misal: ORD-20250107-001)

            // Data pelanggan
            $table->string('customer_name'); // ⭐ UBAH: wajib diisi (hapus nullable)
            $table->string('table_number'); // ⭐ UBAH: wajib diisi
            $table->string('customer_phone')->nullable(); // opsional untuk notifikasi

            // Harga
            $table->integer('subtotal')->default(0); // total harga item
            $table->integer('tax')->default(0); // ⭐ TAMBAHAN: pajak jika ada (misal 10%)
            $table->integer('total_price')->default(0); // subtotal + tax

            // Status
            $table->enum('payment_method', ['qris', 'transfer', 'cash'])->nullable(); // ⭐ TAMBAHAN
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'expired'])->default('pending'); // ⭐ tambah expired
            $table->enum('order_status', ['pending', 'confirmed', 'preparing', 'ready', 'completed', 'cancelled'])->default('pending'); // ⭐ lebih detail

            // Midtrans
            $table->string('midtrans_order_id')->nullable()->unique(); // ⭐ tambah unique
            $table->string('midtrans_transaction_id')->nullable();
            $table->text('midtrans_snap_token')->nullable(); // ⭐ TAMBAHAN: untuk simpan snap token
            $table->timestamp('paid_at')->nullable(); // ⭐ TAMBAHAN: waktu pembayaran

            // Metadata
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete(); // ⭐ TAMBAHAN: jika dibuat oleh cashier
            $table->text('notes')->nullable(); // ⭐ TAMBAHAN: catatan dari pelanggan

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
