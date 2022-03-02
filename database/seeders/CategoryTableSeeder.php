<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'          => 'Kunst',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Muziek',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Natuur',
            'created_at'    => now(),
        ]);
    }
}
