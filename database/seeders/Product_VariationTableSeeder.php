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
            'product_id' => 1,
            'stock'      => 1,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 1,
            'stock'      => 2,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 1,
            'stock'      => 3,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 1,
            'stock'      => 4,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 1,
            'stock'      => 5,
            'created_at' => now(),
        ]);

        DB::table('product_variations')->insert([
            'product_id' => 1,
            'stock'      => 6,
            'created_at' => now(),
        ]);


    }
}
