<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    // protected $casts = [
    //     'category_id' => 'array',
    // ];

    // public function products()
    // {
    //     return $this->hasMany(Category::class);
    // }


}
