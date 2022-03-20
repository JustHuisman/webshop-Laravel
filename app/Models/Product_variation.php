<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variation extends Model
{
    use HasFactory;

    protected $table = 'product_variations';

    protected $with = [
        'size',
        'orientation'
    ];

    public function size()
    {
    return $this->belongsTo(Size::class);    
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }
}
