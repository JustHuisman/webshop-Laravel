<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductCategoryFilter extends AbstractFilter
{
    protected $filters = [
        'category_id'     => TypeFilter::class
    ];
}