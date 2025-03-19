<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesAndCategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            ['id' => 1, 'name' => 'active', 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['id' => 2, 'name' => 'inactive', 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['id' => 3, 'name' => 'open', 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['id' => 4, 'name' => 'closed', 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['id' => 5, 'name' => 'complete', 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Dishwashing Liquid', 'status_id' => 1, 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['name' => 'Detergent', 'status_id' => 1, 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['name' => 'Softdrinks', 'status_id' => 1, 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['name' => 'Chips', 'status_id' => 1, 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['name' => 'Biscuits', 'status_id' => 1, 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
            ['name' => 'Energy Drink', 'status_id' => 1, 'created_date' => now(), 'updated_date' => now(), 'created_user' => 1, 'updated_user' => 1],
        ]);
    }
}
