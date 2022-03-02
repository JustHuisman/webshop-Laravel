<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_OrientationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_orientations')->insert([
            'orientation_id' => 1,
            'variation_id'   => 1,
            'created_at'     => now(),
        ]);

        DB::table('product_orientations')->insert([
            'orientation_id' => 2,
            'variation_id'   => 1,
            'created_at'     => now(),
        ]);

        DB::table('product_orientations')->insert([
            'orientation_id' => 1,
            'variation_id'   => 3,
            'created_at'     => now(),
        ]);
    }
}
