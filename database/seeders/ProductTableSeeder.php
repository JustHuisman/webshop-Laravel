<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'                => 'Star Wars',
            'amount_sold'         => 5,
            'discount_percentage' => 10,
            'vat_id'              => 1,
            'created_at'          => now(),
   
        ]);

        DB::table('products')->insert([
            'name'                => 'Batman',
            'amount_sold'         => 0,
            'discount_percentage' => 5,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Spiderman',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);
    }
}
