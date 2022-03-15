<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Order_StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'name'          => 'Processing',
            'created_at'    => now(),
        ]);

        DB::table('order_statuses')->insert([
            'name'          => 'Shipped',
            'created_at'    => now(),
        ]);

        DB::table('order_statuses')->insert([
            'name'          => 'Delivered',
            'created_at'    => now(),
        ]);

        DB::table('order_statuses')->insert([
            'name'          => 'Completed',
            'created_at'    => now(),
        ]);
    }
}
