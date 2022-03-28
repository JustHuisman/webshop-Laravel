<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        
    }

    public function fetchProducts()
    {
        $data = Product::with('variations', 'size')->orderBy('amount_sold', 'desc')->paginate(6);
        return response()->json($data);
    }
}
