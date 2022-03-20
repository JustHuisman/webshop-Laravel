<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientation extends Model
{
    use HasFactory;

    protected $table = 'orientations';

    protected $fillable = [
        'product_id',
        'variation_id'
    ];
}
