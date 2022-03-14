<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
    public function fetchProducts()
    {
        $data = Product::orderBy('id')->paginate(6);
        return response()->json($data);
    }
}
