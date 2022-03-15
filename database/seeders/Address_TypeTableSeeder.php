<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Address_TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address_types')->insert([
            'name'          => 'Business address',
            'created_at'    => now(),
        ]);

        DB::table('address_types')->insert([
            'name'          => 'Billing address',
            'created_at'    => now(),
        ]);

        DB::table('address_types')->insert([
            'name'          => 'Shipping address',
            'created_at'    => now(),
        ]);
    }
}
