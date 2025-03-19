<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_user' => 1,
                'updated_user' => 1,
            ],
            [
                'id' => 2,
                'name' => 'User',
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_user' => 1,
                'updated_user' => 1,
            ]
        ]);
    }
}