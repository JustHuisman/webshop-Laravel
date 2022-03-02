<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrientationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orientations')->insert([
            'name'          => 'Landscape',
            'created_at'    => now(),
        ]);

        DB::table('orientations')->insert([
            'name'          => 'Portrait',
            'created_at'    => now(),
        ]);
    }
}
