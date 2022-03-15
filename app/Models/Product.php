<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'amount_sold',
        'discount_percentage',
        'vat_id',
 
    ];

    protected $hidden = [
        
    ];

    protected $with = [
        'productCategories',
        'productVariations',

    ];

    public function productCategories()
    {
        return $this->hasMany(Product_category::class);
    }

    public function productVariations()
    {
        return $this->hasMany(Product_variation::class);
    }

}

