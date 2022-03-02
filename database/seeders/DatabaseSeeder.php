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
        $this->call(VatTableSeeder::class);
        $this->call(Product_VariationsTableSeeder::class);
        $this->call(ProductTableSeeder::class);

        $this->call(CategoryTableSeeder::class);
        $this->call(Product_CategoryTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(OrientationTableSeeder::class);
        $this->call(Product_OrientationTableSeeder::class);
        $this->call(Product_SizeTableSeeder::class);
        $this->call(Address_TypeTableSeeder::class);
        $this->call(Product_StatusTableSeeder::class);
        $this->call(Order_StatusTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ReturnsTableSeeder::class);
        $this->call(Order_DetailTableSeeder::class);
        
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
