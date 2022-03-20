<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $products = [
        [
            'id' => 1,
            'stock' => 50,
            'name' => 'Sunset',
            'category' => [1, 5],
        ],
        [
            'id' => 2,
            'stock' => 105,
            'name' => 'Bird',
            'category' => [2, 3],
        ],
        [
            'id' => 3,
            'stock' => 25,
            'name' => 'Puppy',
            'category' => [2],
        ],
        [
            'id' => 4,
            'stock' => 50,
            'name' => 'Falcon Heavy Launch',
            'category' => [4],
        ],
        [
            'id' => 5,
            'stock' => 9,
            'name' => 'SpaceX Dragon',
            'category' => [4],
        ],
        [
            'id' => 6,
            'stock' => 50,
            'name' => 'Space Shuttle Launch',
            'category' => [4],
        ],
        [
            'id' => 7,
            'stock' => 110,
            'name' => 'Night Sky',
            'category' => [4,5],
        ],
        [
            'id' => 8,
            'stock' => 50,
            'name' => 'Falcon 9 Launch',
            'category' => [4],
        ],
        [
            'id' => 9,
            'stock' => 75,
            'name' => 'Falcon 9 Launch',
            'category' => [4],
        ],
        [
            'id' => 10,
            'stock' => 50,
            'name' => 'Buck',
            'category' => [2,3],
        ],
        [
            'id' => 11,
            'stock' => 100,
            'name' => 'Cat',
            'category' => [2],
        ],
        [
            'id' => 12,
            'stock' => 50,
            'name' => 'Skyline',
            'category' => [6],
        ],
        [
            'id' => 13,
            'stock' => 50,
            'name' => 'Sunset',
            'category' => [1,5],
        ],
        [
            'id' => 14,
            'stock' => 200,
            'name' => 'Ocean Sky',
            'category' => [5],
        ],
        [
            'id' => 15,
            'stock' => 50,
            'name' => 'ISS',
            'category' => [4],
        ],
        [
            'id' => 16,
            'stock' => 50,
            'name' => 'Moonman',
            'category' => [4],
        ],
        [
            'id' => 17,
            'stock' => 200,
            'name' => 'Clouds',
            'category' => [1,5],
        ],
        [
            'id' => 18,
            'stock' => 200,
            'name' => 'Galaxy',
            'category' => [4],
        ],
        [
            'id' => 19,
            'stock' => 9,
            'name' => 'Whale',
            'category' => [2,3],
        ],
        [
            'id' => 20,
            'stock' => 200,
            'name' => 'Kitten',
            'category' => [2,3],
        ],
        [
            'id' => 21,
            'stock' => 5,
            'name' => 'Christmas Tree',
            'category' => [8],
        ],
        [
            'id' => 22,
            'stock' => 4,
            'name' => 'Winter Cabin',
            'category' => [3,8],
        ],
        [
            'id' => 23,
            'stock' => 50,
            'name' => 'Fox',
            'category' => [2,3],
        ],
        [
            'id' => 24,
            'stock' => 50,
            'name' => 'Elephant',
            'category' => [2,3],
        ],
        [
            'id' => 25,
            'stock' => 50,
            'name' => 'ISS Aurora',
            'category' => [4],
        ],
        [
            'id' => 26,
            'stock' => 50,
            'name' => 'Skyline',
            'category' => [6],
        ],
        [
            'id' => 27,
            'stock' => 50,
            'name' => 'Horses',
            'category' => [2,3],
        ],
        [
            'id' => 28,
            'stock' => 50,
            'name' => 'Denver Streets',
            'category' => [7],
        ],
        [
            'id' => 29,
            'stock' => 2,
            'name' => 'Christmas Tree',
            'category' => [8],
        ],
        [
            'id' => 30,
            'stock' => 50,
            'name' => 'Nebula',
            'category' => [4],
        ],
        [
            'id' => 31,
            'stock' => 50,
            'name' => 'Beach Sunset',
            'category' => [1,5,9],
        ],
        [
            'id' => 32,
            'stock' => 50,
            'name' => 'Winter Valley',
            'category' => [3,8,10]
        ],
        [
            'id' => 33,
            'stock' => 50,
            'name' => 'Miami',
            'category' => [1,8],
        ],
        [
            'id' => 34,
            'stock' => 50,
            'name' => 'Skyline',
            'category' => [6,7],
        ],
        [
            'id' => 35,
            'stock' => 50,
            'name' => 'New York',
            'category' => [7],
        ],
        [
            'id' => 36,
            'stock' => 50,
            'name' => 'Romania Valley',
            'category' => [3,10],
        ],
        [
            'id' => 37,
            'stock' => 50,
            'name' => 'North Pole Aurora',
            'category' => [2,3,4,5],
        ],
        [
            'id' => 38,
            'stock' => 50,
            'name' => 'Desert',
            'category' => [3],
        ],
        [
            'id' => 39,
            'stock' => 50,
            'name' => 'Waterfall',
            'category' => [3,10],
        ],
        [
            'id' => 40,
            'stock' => 50,
            'name' => 'Winter Hills',
            'category' => [3],
        ],
        [
            'id' => 41,
            'stock' => 50,
            'name' => 'Cliffs & River',
            'category' => [3],
        ],
        [
            'id' => 42,
            'stock' => 50,
            'name' => 'Sunny Beach',
            'category' => [8,9],
        ],
        [
            'id' => 43,
            'stock' => 50,
            'name' => 'Cliffs & Ocean',
            'category' => [3,9],
        ],
        [
            'id' => 44,
            'stock' => 50,
            'name' => 'Beautiful Lake',
            'category' => [3,10],
        ],
        [
            'id' => 45,
            'stock' => 50,
            'name' => 'New York',
            'category' => [6,7],
        ],
        [
            'id' => 46,
            'stock' => 50,
            'name' => 'Beach Sunset',
            'category' => [1,5,8,9],
        ],
        [
            'id' => 47,
            'stock' => 50,
            'name' => 'Hollywood',
            'category' => [7],
        ],
        [
            'id' => 48,
            'stock' => 50,
            'name' => 'Skyline',
            'category' => [6,7],
        ],
        [
            'id' => 49,
            'stock' => 50,
            'name' => 'Winter Hill',
            'category' => [1,3,5,8],
        ],
        [
            'id' => 50,
            'stock' => 50,
            'name' => 'Winter Trees',
            'category' => [3,8,10],
        ],
        [
            'id' => 51,
            'stock' => 50,
            'name' => 'Frozen Lake',
            'category' => [3,8],
        ],
        [
            'id' => 52,
            'stock' => 50,
            'name' => 'California Pier',
            'category' => [1,5,8,9],
        ],
        [
            'id' => 53,
            'stock' => 50,
            'name' => 'Mountain',
            'category' => [3,10],
        ],
        [
            'id' => 54,
            'stock' => 50,
            'name' => 'Mossy Waterfall',
            'category' => [3,10],
        ],
        [
            'id' => 55,
            'stock' => 50,
            'name' => 'Sunset',
            'category' => [1,5],
        ],
        [
            'id' => 56,
            'stock' => 100,
            'name' => 'Field and Treeline',
            'category' => [3],
        ],  ];

        $this->call(VatTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(OrientationTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(Address_TypeTableSeeder::class);
        $this->call(Order_StatusTableSeeder::class);

        $this->callWith(ProductTableSeeder::class,           ['products'          => $products]);
        $this->callWith(Product_VariationTableSeeder::class, ['productvariations' => $products]);
        $this->callWith(Product_CategoryTableSeeder::class,  ['productcategories' => $products]);
        $this->call(Product_StatusTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ReturnsTableSeeder::class);
        $this->call(Order_DetailTableSeeder::class);
    }
}
