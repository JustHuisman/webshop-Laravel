<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_sizes')->insert([
            'size_id'      => 1,
            'variation_id' => 1,
            'created_at'   => now(),
        ]);

        DB::table('product_sizes')->insert([
            'size_id'      => 2,
            'variation_id' => 2,
            'created_at'   => now(),
        ]);

        DB::table('product_sizes')->insert([
            'size_id'      => 3,
            'variation_id' => 3,
            'created_at'   => now(),
        ]);
    }
}
