<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('name');

        $menuItems = [
            // Rice Category
            ['category_id' => $categories['Rice']->id, 'name' => 'Chicken Fried Rice', 'price' => 1200.00, 'is_featured' => true],
            ['category_id' => $categories['Rice']->id, 'name' => 'Seafood Nasi Goreng', 'price' => 1500.00, 'is_spicy' => true],
            ['category_id' => $categories['Rice']->id, 'name' => 'Vegetable Biryani', 'price' => 900.00, 'is_vegetarian' => true],
            
            // Kottu Category
            ['category_id' => $categories['Kottu']->id, 'name' => 'Cheese Chicken Kottu', 'price' => 1600.00, 'is_featured' => true],
            ['category_id' => $categories['Kottu']->id, 'name' => 'Beef Dolphin Kottu', 'price' => 1800.00, 'is_spicy' => true, 'spice_level' => 2],
            ['category_id' => $categories['Kottu']->id, 'name' => 'Vegetable Kottu', 'price' => 800.00, 'is_vegetarian' => true],

            // Burgers Category
            ['category_id' => $categories['Burgers']->id, 'name' => 'Crispy Chicken Burger', 'price' => 1100.00, 'is_featured' => true],
            ['category_id' => $categories['Burgers']->id, 'name' => 'Double Beef Burger', 'price' => 1900.00],
            ['category_id' => $categories['Burgers']->id, 'name' => 'Spicy Paneer Burger', 'price' => 1000.00, 'is_vegetarian' => true, 'is_spicy' => true],

            // Drinks Category
            ['category_id' => $categories['Drinks']->id, 'name' => 'Fresh Lime Juice', 'price' => 400.00, 'is_vegetarian' => true],
            ['category_id' => $categories['Drinks']->id, 'name' => 'Iced Milo', 'price' => 500.00, 'is_vegetarian' => true],
            ['category_id' => $categories['Drinks']->id, 'name' => 'Coca Cola (500ml)', 'price' => 250.00, 'is_vegetarian' => true],

            // Desserts Category
            ['category_id' => $categories['Desserts']->id, 'name' => 'Watalappam', 'price' => 350.00, 'is_vegetarian' => true],
            ['category_id' => $categories['Desserts']->id, 'name' => 'Chocolate Biscuit Pudding', 'price' => 450.00, 'is_featured' => true, 'is_vegetarian' => true],
            ['category_id' => $categories['Desserts']->id, 'name' => 'Vanilla Ice Cream', 'price' => 300.00, 'is_vegetarian' => true],
        ];

        $order = 1;
        foreach ($menuItems as $item) {
            MenuItem::create(array_merge([
                'slug' => Str::slug($item['name']),
                'short_description' => 'A delicious ' . strtolower($item['name']) . ' made with fresh ingredients.',
                'is_active' => true,
                'is_available' => true,
                'is_featured' => $item['is_featured'] ?? false,
                'is_vegetarian' => $item['is_vegetarian'] ?? false,
                'is_spicy' => $item['is_spicy'] ?? false,
                'spice_level' => $item['spice_level'] ?? null,
                'display_order' => $order++,
            ], $item));
        }
    }
}