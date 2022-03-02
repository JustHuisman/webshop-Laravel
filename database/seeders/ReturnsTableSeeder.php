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
            'reason'        => 'Verkeerd artikel ontvangen',
            'user_comments' => 'Geen commentaar',
            'created_at'    => now(),
        ]);

        DB::table('returns')->insert([
            'user_id'       => 2,
            'order_id'      => 2,
            'reason'        => 'Product defect',
            'user_comments' => 'Ik wil een ander artikel',
            'created_at'    => now(),
        ]);

        DB::table('returns')->insert([
            'user_id'       => 3,
            'order_id'      => 3,
            'reason'        => 'Ik heb mij bedacht',
            'created_at'    => now(),
        ]);
    }
}
