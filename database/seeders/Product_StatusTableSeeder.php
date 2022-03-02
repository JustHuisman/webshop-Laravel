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
            'name'          => 'Geen',
            'created_at'    => now(),
        ]);

        DB::table('product_statuses')->insert([
            'name'          => 'Terugkerend',
            'created_at'    => now(),
        ]);

        DB::table('product_statuses')->insert([
            'name'          => 'Teruggekeerd',
            'created_at'    => now(),
        ]);

        DB::table('product_statuses')->insert([
            'name'          => 'Verwerkt',
            'created_at'    => now(),
        ]);
    }
}
