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
            'name'          => 'Large',
            'price'         => 15,
            'created_at'    => now(),
        ]);

        DB::table('sizes')->insert([
            'name'          => 'Medium',
            'price'         => 10,
            'created_at'    => now(),
        ]);

        DB::table('sizes')->insert([
            'name'          => 'Small',
            'price'         => 5,
            'created_at'    => now(),
        ]);

    }
}
