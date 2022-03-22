<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_variation;

class ProductsController extends Controller
{
    public function index()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $products = Product::paginate(10);
        $lastpage = ceil(Product::latest()->first()->id / 10);
        
        return view('admin-products.index', [
            'products' => $products,
            'page'     => $page,
            'lastpage' => $lastpage
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        $test = Product_variation::all();
        return view('admin-products.show', [
            'product' => $product,
            'image'   => '/public/images/posters/portrait/1.jpg'
        ]);
    }

    // public function Edit($id){
        
        
    //     
    //     return view('admin.category.edit',compact('categories'));
    // }

}
