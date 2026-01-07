<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique(); // ⭐ TAMBAHAN: untuk SEO-friendly URL
            $table->integer('price'); // atau gunakan decimal(10,2) jika pakai desimal
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true); // ⭐ UBAH: lebih fleksibel dari enum
            $table->integer('sort_order')->default(0); // ⭐ TAMBAHAN: untuk urutan tampilan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
