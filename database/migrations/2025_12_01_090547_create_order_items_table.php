<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');

            $table->string('menu_name'); // ⭐ TAMBAHAN: snapshot nama menu saat order
            $table->integer('price'); // harga satuan saat order
            $table->integer('qty');
            $table->integer('subtotal'); // ⭐ TAMBAHAN: price * qty (untuk performa)

            $table->text('notes')->nullable(); // ⭐ TAMBAHAN: catatan per item (misal: "matang banget")

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
