<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_orientation extends Model
{
    use HasFactory;

    protected $table = 'product_orientations';

    protected $with = [
        'productOrientations',

    ];

    public function productOrientations()
    {
        return $this->belongsTo(Product_variation::class);
    }
}
