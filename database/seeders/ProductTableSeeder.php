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
            'name'                => 'Sunset',
            'amount_sold'         => 5,
            'discount_percentage' => 10,
            'vat_id'              => 1,
            'created_at'          => now(),
   
        ]);

        DB::table('products')->insert([
            'name'                => 'Bird',
            'amount_sold'         => 0,
            'discount_percentage' => 5,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Puppy',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Falcon Heavy Launch',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'SpaceX Dragon',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 1,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Space Shuttle Launch',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Night Sky',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Falcon 9 Launch',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 1,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Falcon 9 Launch',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Buck',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Cat',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 1,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Skyline',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Sunset',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Ocean Sky',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 1,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'ISS',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Moonman',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Clouds',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 1,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Galaxy',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Whale',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 3,
            'created_at'          => now(),
        ]);

        DB::table('products')->insert([
            'name'                => 'Kitten',
            'amount_sold'         => 1,
            'discount_percentage' => 0,
            'vat_id'              => 2,
            'created_at'          => now(),
        ]);

    }
}
