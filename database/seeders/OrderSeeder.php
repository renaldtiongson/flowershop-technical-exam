<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('order')->insert([
            [
                'product_id' => 5,
                'user_id' => 1,
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'user_id' => 1,
                'price' => 123.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'user_id' => 1,
                'price' => 300.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'product_id' => 8,
                'user_id' => 1,
                'price' => 123.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
