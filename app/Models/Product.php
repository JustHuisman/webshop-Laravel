<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}

