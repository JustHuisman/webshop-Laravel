<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variation;

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
        $productCount = Product::count();
        $lastpage = ceil($productCount / 10);
        
        return view('admin-products.index', [
            'products' => $products,
            'page'     => $page,
            'lastpage' => $lastpage
        ]);
    }

    public function create()
    {
        return view('admin-products.create', [
            'method'  => 'POST',
            'action'  => '/admin-products/store',   
        ]);
    }

    public function store()
    {
        $product = $_POST;
        
        Product::create([
            'name' => $product['name'],
            'vat_id' => $product['vat_id']
        ]);

        $productId = Variation::latest()->first();
        Variation::create([
            'product_id'     => $productId['product_id'] + 1,
            'orientation_id' => $product['orientation_id'],
            'size_id'        => $product['size_id'],
            'stock'          => $product['stock']
        ]);

        return redirect()->route('admin-products.index')->with('success', 'Product created successfully.');
    }


    public function variation($id)
    {
        $productId = Product::find($id);
        $variationId = Variation::with('product')->where('product_id', 2)->get();
        dd($variationId);

        return view('admin-products.variation', [
            'variations' => $variationId,
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

        $product = Product::find($id);
 
        $product->update($data);

        $product->variations->first()->update($data);

        return redirect()->route('admin-products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return Redirect()->route('admin-products.index')->with('success', 'Product deleted successfully');
    }

}
