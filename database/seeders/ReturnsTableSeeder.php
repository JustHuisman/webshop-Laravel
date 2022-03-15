<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReturnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('returns')->insert([
            'user_id'       => 1,
            'order_id'      => 1,
            'reason'        => 'Received wrong article',
            'user_comments' => 'No comment',
            'created_at'    => now(),
        ]);

        DB::table('returns')->insert([
            'user_id'       => 2,
            'order_id'      => 2,
            'reason'        => 'Product defect',
            'user_comments' => 'I want another product',
            'created_at'    => now(),
        ]);

        DB::table('returns')->insert([
            'user_id'       => 3,
            'order_id'      => 3,
            'reason'        => 'I changed my mind',
            'created_at'    => now(),
        ]);
    }
}
