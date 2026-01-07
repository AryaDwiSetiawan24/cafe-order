<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    public function definition(): array
    {
        return [
            'table_number' => fake()->unique()->numberBetween(1, 50),
            'capacity' => fake()->randomElement([2, 4, 6, 8]),
            'qr_code' => null,
            'is_active' => true,
        ];
    }
}
