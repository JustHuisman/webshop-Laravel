<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);

        return view('admin-products.index', [
            'products' => $products
        ]);
    }

    public function show()
    {
        
    }


}
