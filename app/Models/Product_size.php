<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';

    protected $with = [
        'productSizes',

    ];

    public function productSizes()
    {
        return $this->belongsTo(Product_variation::class);
    }
}
