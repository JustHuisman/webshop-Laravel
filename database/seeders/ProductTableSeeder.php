<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Database\Seeders\Product_CategoryTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($productdata)
    {
        //data in DatabaseSeeder.php

        foreach ($productdata as $array) {
            Product::create([
                'name'                => $array['name'],
                'amount_sold'         => $array['id'],
                'discount_percentage' => 10,
                'vat_id'              => rand(1,3),
                'created_at'          => now(),
                ]);
            }
    }
}
