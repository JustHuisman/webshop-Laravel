<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'user_id'         => 1,
            'address_type_id' => 2,
            'first_name'      => 'Donald',
            'last_name'       => 'Duck',
            'company_name'    => 'The Walt Disney Company',
            'phone_number'    => '0598-12 34 56',
            'address'         => 'Kwakstraat 13',
            'postal_code'     => '1234AB',
            'city'            => 'Duckstad',
            'created_at'      => now(),
        ]);

        DB::table('addresses')->insert([
            'user_id'         => 2,
            'address_type_id' => 1,
            'first_name'      => 'Katrien',
            'last_name'       => 'Duck',
            'phone_number'    => '0687654321',
            'address'         => 'Snaterstraat 1',
            'postal_code'     => '4321 AB',
            'city'            => 'Gansdorp',
            'created_at'      => now(),
        ]);

        DB::table('addresses')->insert([
            'user_id'         => 5,
            'address_type_id' => 3,
            'first_name'      => 'Guus',
            'last_name'       => 'Geluk',
            'company_name'    => 'Guus Geluk B.V.',
            'phone_number'    => '050-1234567',
            'address'         => 'Kwakstraat 13',
            'postal_code'     => '1234AB',
            'city'            => 'Duckstad',
            'created_at'      => now(),
        ]);
    }
}
