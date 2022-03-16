<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Product_category;
use Database\Seeders\ProductTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Product_CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($productcategorydata)
    {

        //data in DatabaseSeeder.php

        foreach ($productcategorydata as $array) {
            foreach ($array['category'] as $value) {
                Product_category::create([
                    'product_id' => $array['id'],
                    'category_id' => $value,
                    'created_at'  => now(),   
                    ]);
                }
        }
    }
}
