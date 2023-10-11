<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([
            ['name' => 'Phones', 'category_id' => 1],     // Electronics
            ['name' => 'Laptops', 'category_id' => 1],    // Electronics
            ['name' => 'Cameras', 'category_id' => 1],    // Electronics

            ['name' => "Men's Clothing", 'category_id' => 2],   // Clothing
            ['name' => "Women's Clothing", 'category_id' => 2], // Clothing
            ['name' => "Kids' Clothing", 'category_id' => 2],   // Clothing

            ['name' => 'Cookware', 'category_id' => 3],   // Home & Kitchen
            ['name' => 'Furniture', 'category_id' => 3],  // Home & Kitchen
            ['name' => 'Appliances', 'category_id' => 3], // Home & Kitchen

            ['name' => 'Outdoor Gear', 'category_id' => 4],     // Sports & Outdoors
            ['name' => 'Fitness Equipment', 'category_id' => 4], // Sports & Outdoors
            ['name' => 'Sports Apparel', 'category_id' => 4],    // Sports & Outdoors
        ]);
    }
}
