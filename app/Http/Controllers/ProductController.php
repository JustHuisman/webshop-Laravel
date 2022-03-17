<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {

    }

    public function fetchProducts()
    {
        $data = Product::orderBy('amount_sold', 'desc')->paginate(6);
        return response()->json($data);

        
    }
}
