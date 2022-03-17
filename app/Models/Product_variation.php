<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variation extends Model
{
    use HasFactory;

    protected $table = 'product_variations';

    protected $with = [
        'products',
        'productSizes',
        'productOrientations',

    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function productSizes()
    {
        return $this->hasMany(Product_size::class, 'size_id');
    }

    public function productOrientations()
    {
        return $this->hasMany(Product_orientation::class, 'orientation_id');
    }

}
