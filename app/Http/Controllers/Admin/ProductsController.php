<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
        $productId = Product::find($id);
        Product::with('variations', 'size')->get();

        return view('admin-products.show', [
            'product' => $productId,
        ]);
    }

    public function edit($id)
    {
        $productId = Product::find($id);

        return view('admin-products.edit', [
            'method'  => 'POST',
            'product' => $productId,
            'action'  => '/admin-products/' . $id . '/update',   
        ]);
    }


    public function update($id)
    {   
        $data = $_POST;

        //hier zit je product in.
        $product = Product::find($id);
        
        //update je product data.
        $product->update($data);

        //update de variatie data.
        $product->variations->first()->update($data);

        return redirect()->route('admin-products.index')->with('success', 'Product updated successfully');
    }

}
