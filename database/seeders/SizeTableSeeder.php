<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'name'          => 'Groot',
            'created_at'    => now(),
        ]);

        DB::table('sizes')->insert([
            'name'          => 'Middel',
            'created_at'    => now(),
        ]);

        DB::table('sizes')->insert([
            'name'          => 'Klein',
            'created_at'    => now(),
        ]);

    }
}
