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
        'name',
        'created_at'
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $with = [
        'productCategories',
        'variations',
        'size',
        'order_details'
    ];

    public function productCategories()
    {
        return $this->hasMany(Product_category::class);
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function order_details()
    {
        return $this->hasMany(Order_detail::class);
    }
}

