<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'product_id'  => 3,
            'category_id' => 1,
            'created_at'  => now(),
        ]);

        DB::table('product_categories')->insert([
            'product_id'  => 1,
            'category_id' => 2,
            'created_at'  => now(),
        ]);

        DB::table('product_categories')->insert([
            'product_id'  => 3,
            'category_id' => 3,
            'created_at'  => now(),
        ]);
 
    }
}
