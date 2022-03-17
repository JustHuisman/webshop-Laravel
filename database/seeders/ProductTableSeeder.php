<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($products)
    {
        //data in DatabaseSeeder.php

        foreach ($products as $product) {
            Product::create([
                'name'                => $product['name'],
                'amount_sold'         => $product['id'],
                'discount_percentage' => 10,
                'vat_id'              => rand(1,3),
                'created_at'          => now(),
                ]);
            }
    }
}
