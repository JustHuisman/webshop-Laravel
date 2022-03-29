<?php

namespace Database\Seeders;

use App\Models\Variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($variations)
    {
 
        //data in DatabaseSeeder.php

        foreach ($variations as $variation) {
            for ($i = 1; $i < 3; $i++) {
                for ($j = 1; $j < 4; $j++) {
                    Variation::create([
                        'product_id'     => $variation['id'],
                        'stock'          => $variation['stock'] + rand(0, 20),
                        'orientation_id' => $i,
                        'size_id'        => $j
                        ]);
                }
            }
        }
    }
}
