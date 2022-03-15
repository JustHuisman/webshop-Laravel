<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vat')->insert([
            'name'          => 'General rate',
            'percentage'    => 21,
            'created_at'    => now(),
        ]);

        DB::table('vat')->insert([
            'name'          => 'Low rate',
            'percentage'    => 9,
            'created_at'    => now(),
        ]);

        DB::table('vat')->insert([
            'name'          => 'Exemption',
            'percentage'    => 0,
            'created_at'    => now(),
        ]);
    }
}
