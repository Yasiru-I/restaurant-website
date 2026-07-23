<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Rice', 'Kottu', 'Burgers', 'Drinks', 'Desserts'];

        foreach ($categories as $index => $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'display_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}