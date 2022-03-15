<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variation extends Model
{
    use HasFactory;

    protected $table = 'product_variations';

    // protected $with = [
    //     'productSizes',
    //     'productOrientations',

    // ];

    // public function productSizes()
    // {
    //     return $this->hasMany(Product_size::class);
    // }

    // public function productOrientations()
    // {
    //     return $this->hasMany(Product_orientation::class);
    // }

}
