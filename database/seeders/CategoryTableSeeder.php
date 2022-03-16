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
        
        $categories = [
            'Sunset',
            'Animals',
            'Nature',
            'Space',
            'Sky',
            'Skyline',
            'City',
            'Holiday',
            'Beach',
            'Mountain',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name'          => $category,
                'created_at'    => now(),
            ]);
            
        }
    }
}
