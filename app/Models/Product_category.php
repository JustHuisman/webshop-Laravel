<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\ProductCategoryFilter;

class Product_category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $casts = [
        'category_id' => 'array',
    ];

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductCategoryFilter($request))->filter($builder);
    }
}
