<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Dishwashing Liquid
            ['name' => 'Sunlight Lemon', 'category_id' => 1, 'status_id' => 1],
            ['name' => 'Joy Antibac', 'category_id' => 1, 'status_id' => 1],
            ['name' => 'Axion Dish Paste', 'category_id' => 1, 'status_id' => 1],
            ['name' => 'Mama Lemon', 'category_id' => 1, 'status_id' => 1],

            // Detergent
            ['name' => 'Tide Powder', 'category_id' => 2, 'status_id' => 1],
            ['name' => 'Ariel Pods', 'category_id' => 2, 'status_id' => 1],
            ['name' => 'Downy Liquid', 'category_id' => 2, 'status_id' => 1],
            ['name' => 'Surf Detergent Bar', 'category_id' => 2, 'status_id' => 1],

            // Softdrinks
            ['name' => 'Coca-Cola', 'category_id' => 3, 'status_id' => 1],
            ['name' => 'Pepsi', 'category_id' => 3, 'status_id' => 1],
            ['name' => 'Sprite', 'category_id' => 3, 'status_id' => 1],
            ['name' => 'Royal Orange', 'category_id' => 3, 'status_id' => 1],

            // Chips
            ['name' => 'Lays Classic', 'category_id' => 4, 'status_id' => 1],
            ['name' => 'Doritos Nacho Cheese', 'category_id' => 4, 'status_id' => 1],
            ['name' => 'Pringles Original', 'category_id' => 4, 'status_id' => 1],
            ['name' => 'Cheetos Puffs', 'category_id' => 4, 'status_id' => 1],

            // Biscuits
            ['name' => 'Oreo Chocolate', 'category_id' => 5, 'status_id' => 1],
            ['name' => 'Chips Ahoy', 'category_id' => 5, 'status_id' => 1],
            ['name' => 'Marie Biscuits', 'category_id' => 5, 'status_id' => 1],
            ['name' => 'Skyflakes Crackers', 'category_id' => 5, 'status_id' => 1],

            // Energy Drinks
            ['name' => 'Red Bull', 'category_id' => 6, 'status_id' => 1],
            ['name' => 'Monster Energy', 'category_id' => 6, 'status_id' => 1],
            ['name' => 'Gatorade Blue Bolt', 'category_id' => 6, 'status_id' => 1],
            ['name' => 'Powerade Mountain Blast', 'category_id' => 6, 'status_id' => 1],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'category_id' => $product['category_id'],
                'status_id' => $product['status_id'],
                'unit_id' => 1, // New column added
                'description' => $product['name'] . ' Description',
                'created_date' => now(),
                'updated_date' => now(),
                'created_user' => 1,
                'updated_user' => 1,
            ]);
        }
    }
}
