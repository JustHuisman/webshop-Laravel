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
            'name'          => 'Sunset',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Animals',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Nature',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Space',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Sky',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Skyline',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'City',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Holiday',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Beach',
            'created_at'    => now(),
        ]);

        DB::table('categories')->insert([
            'name'          => 'Mountain',
            'created_at'    => now(),
        ]);
    }
}
