<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id'          => 1,
            'subtotal'         => 95,
            'total'            => 100,
            'delivery_address' => 1,
            'invoice_address'  => 2,
            'delivery_date'    => date('y-m-d'),
            'order_number'     => 1,
            'order_status'     => 4,
            'created_at'       => now(),
        ]);

        DB::table('orders')->insert([
            'user_id'          => 2,
            'subtotal'         => 24,
            'total'            => 24.99,
            'delivery_address' => 2,
            'invoice_address'  => 2,
            'delivery_date'    => date_create('2022-03-05'),
            'order_number'     => 2,
            'order_status'     => 3,
            'created_at'       => now(),
        ]);

        DB::table('orders')->insert([
            'user_id'          => 3,
            'subtotal'         => 95,
            'total'            => 100,
            'delivery_address' => 3,
            'invoice_address'  => 3,
            'delivery_date'    => date_create('2022-04-01'),
            'order_number'     => 3,
            'order_status'     => 2,
            'created_at'       => now(),
        ]);
    }
}
