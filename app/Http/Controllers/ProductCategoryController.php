<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_category;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        return Product_category::filter($request)->get();
    }
}
