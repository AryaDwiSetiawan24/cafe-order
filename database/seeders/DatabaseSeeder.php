<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\Table;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin & Cashier
        User::create([
            'name' => 'Admin',
            'email' => 'admin@resto.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Kasir 1',
            'email' => 'cashier@resto.com',
            'password' => Hash::make('password'),
            'role' => 'cashier',
            'is_active' => true,
        ]);

        // 2. Create Categories
        $categories = [
            'Makanan Berat',
            'Snack & Appetizer',
            'Minuman Dingin',
            'Minuman Panas',
            'Dessert',
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
                'is_active' => true,
            ]);
        }

        // 3. Create Menus
        Menu::factory(30)->create();

        // 4. Create Tables
        for ($i = 1; $i <= 20; $i++) {
            Table::create([
                'table_number' => $i,
                'capacity' => [2, 4, 6, 8][array_rand([2, 4, 6, 8])],
                'is_active' => true,
            ]);
        }

        $this->command->info('✅ Seeding completed!');
        $this->command->info('Admin: admin@resto.com / password');
        $this->command->info('Cashier: cashier@resto.com / password');
    }
}
