<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_category;
use App\Models\Product;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        // $categories = Product_category::filter($request)->get();
        $products = Product::filter($request)->get();
        $categories = Product_category::all();

        return view('home', [
            'categories' => $categories,
            'products' => $products
            
        ]);
    }
}
