<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'    => 'Donald',
            'last_name'     => 'Duck',
            'email'         => 'donald.duck@codegorilla.nl',
            'password'      => bcrypt('Gorilla1!'),
            'role'          => 1,
            'created_at'    => now(),
            'created_by'    => 1,
        ]);

        DB::table('users')->insert([
            'first_name'    => 'Katrien',
            'last_name'     => 'Duck',
            'email'         => 'katrien.duck@codegorilla.nl',
            'password'      => bcrypt('Gorilla1!'),
            'role'          => 2,
            'created_at'    => now(),
            'created_by'    => 1,
        ]);

        \App\Models\User::factory(5)->create();
    }
}
