<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_VariationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_variations')->insert([
            'product_id' => 5,
            'stock'      => 12,
            'price'      => 10,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 1,
            'stock'      => 0,
            'price'      => 24.99,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 3,
            'stock'      => 101,
            'price'      => 8.9,
            'created_at' => now(),
        ]);

    }
}
