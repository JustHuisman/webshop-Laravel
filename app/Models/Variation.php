<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';

    protected $fillable = [
        'product_id',
        'size_id',
        'orientation_id',
        'stock',
        'created_at'
    ];

    protected $with = [
        // 'product',
        'size',
        'orientation'
    ];

    public function product()
    {
    return $this->belongsTo(Product::class);    
    }

    public function size()
    {
    return $this->belongsTo(Size::class);    
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }
}
