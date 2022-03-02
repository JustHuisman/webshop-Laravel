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
            'name'          => 'Verwerken',
            'created_at'    => now(),
        ]);

        DB::table('order_statuses')->insert([
            'name'          => 'Verzonden',
            'created_at'    => now(),
        ]);

        DB::table('order_statuses')->insert([
            'name'          => 'Geleverd',
            'created_at'    => now(),
        ]);

        DB::table('order_statuses')->insert([
            'name'          => 'Compleet',
            'created_at'    => now(),
        ]);
    }
}
