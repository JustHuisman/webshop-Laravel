<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';

    protected $with = [
        'products',
    ];

    public function products()
    {
        return $this->belongsTo(Product_size::class);
    }

}
