<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_statuses')->insert([
            'name'          => 'None',
            'created_at'    => now(),
        ]);

        DB::table('product_statuses')->insert([
            'name'          => 'Returning',
            'created_at'    => now(),
        ]);

        DB::table('product_statuses')->insert([
            'name'          => 'Returned',
            'created_at'    => now(),
        ]);

        DB::table('product_statuses')->insert([
            'name'          => 'Processed',
            'created_at'    => now(),
        ]);
    }
}
