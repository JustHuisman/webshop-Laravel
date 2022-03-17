<?php

namespace Database\Seeders;

use App\Models\Product_variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_VariationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($productvariations)
    {
 
        //data in DatabaseSeeder.php

        foreach ($productvariations as $productvariation) {
        for ($i = 1; $i < 7; $i++) {
            Product_variation::create([
                'product_id' => $productvariation['id'],
                'stock'      => $i
                ]);
            }
        }
    }
}
