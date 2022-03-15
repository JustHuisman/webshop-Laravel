<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Order_DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            'order_id'            => 1,
            'product_id'          => 1,
            'product_orientation' => 2,
            'product_size'        => 1,
            'quantity'            => 1,
            'price'               => 15,
            'discounted_price'    => 12.50,
            'product_name'        => 'Sunset',
            'product_status'      => 4,
            'return_quantity'     => 0,
            'created_at'          => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id'            => 2,
            'product_id'          => 2,
            'product_orientation' => 1,
            'product_size'        => 2,
            'quantity'            => 1,
            'price'               => 10,
            'discounted_price'    => 7.5,
            'product_name'        => 'Bird',
            'product_status'      => 3,
            'return_quantity'     => 1,
            'created_at'          => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id'            => 3,
            'product_id'          => 3,
            'product_orientation' => 2,
            'product_size'        => 3,
            'quantity'            => 1,
            'price'               => 5,
            'discounted_price'    => 3.75,
            'product_name'        => 'Puppy',
            'product_status'      => 1,
            'return_quantity'     => 2,
            'created_at'          => now(),
        ]);
    }
}
