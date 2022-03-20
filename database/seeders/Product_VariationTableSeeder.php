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
            for ($i = 1; $i < 3; $i++) {
                for ($j = 1; $j < 4; $j++) {
                    Product_variation::create([
                        'product_id'     => $productvariation['id'],
                        'stock'          => $productvariation['stock'],
                        'orientation_id' => $i,
                        'size_id'        => $j
                        ]);
                }
            }
        }
    }
}
