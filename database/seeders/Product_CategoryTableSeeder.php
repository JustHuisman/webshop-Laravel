<?php

namespace Database\Seeders;

use App\Models\Product_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($productcategories)
    {

        //data in DatabaseSeeder.php

        foreach ($productcategories as $array) {
            foreach ($array['category'] as $productcategory) {
                Product_category::create([
                    'product_id' => $array['id'],
                    'category_id' => $productcategory,
                    'created_at'  => now(),   
                    ]);
                }
        }
    }
}
