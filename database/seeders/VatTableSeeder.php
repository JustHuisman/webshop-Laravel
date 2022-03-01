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
            'name'          => 'Star Wars',
            'percentage'    => 21,
            'created_at'    => now(),
        ]);

        DB::table('vat')->insert([
            'name'          => 'Batman',
            'percentage'    => 19,
            'created_at'    => now(),
        ]);

        DB::table('vat')->insert([
            'name'          => 'Spiderman',
            'percentage'    => 9,
            'created_at'    => now(),
        ]);
    }
}
