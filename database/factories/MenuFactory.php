<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->randomElement([
            'Nasi Goreng Spesial',
            'Mie Goreng',
            'Ayam Bakar',
            'Sate Ayam',
            'Gado-Gado',
            'Bakso Komplit',
            'Es Teh Manis',
            'Es Jeruk',
            'Kopi Hitam',
            'Jus Alpukat',
            'Pisang Goreng',
            'Kentang Goreng'
        ]);

        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name . '-' . fake()->unique()->numberBetween(1, 1000)),
            'price' => fake()->randomElement([15000, 20000, 25000, 30000, 35000, 10000, 12000, 8000]),
            'description' => fake()->sentence(10),
            'image' => null,
            'is_available' => fake()->boolean(90), // 90% available
            'sort_order' => fake()->numberBetween(0, 100),
        ];
    }
}
