<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Variation;
use App\Models\Category;

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
        $product = Product::latest()->first();

        return view('admin-products.create', [
            'method'  => 'POST',
            'product' => $product,
            'action'  => '/admin-products/store',   
        ]);
    }

    public function createVariation($id)
    {
        $product = Product::find($id);
        
        return view('admin-products.createVariation', [
            'method'  => 'POST',
            'product' => $product,
            'action'  => '/admin-products/' . $product . '/variations/store'   
        ]);
    }

    public function store()
    {
        $product = $_POST;
        
        Product::create([
            'name' => $product['name'],
            'vat_id' => $product['vat_id']
        ]);

        Variation::create([
            'product_id'     => $product['product_id'] + 1,
            'orientation_id' => $product['orientation_id'],
            'size_id'        => $product['size_id'],
            'stock'          => $product['stock']
        ]);
        
        $categories = $product['category_id'];
        
        foreach ($categories as $category) {
            Product_category::create([
                'product_id'  => $product['product_id'] + 1,
                'category_id' => $category
            ]);
        }

        return redirect()->route('admin-products.index')->with('success',
        'Product created successfully.');
    }

    public function storeVariation()
    {
        $variation = $_POST;

        // $input = $request->all();
        // if ($image = $request->file('image')) {
        //     if ($input['orientation_id'] == 1) {
        //         $destinationPath = 'images/posters/landscape';
        //     } else {
        //         $destinationPath = 'images/posters/portrait';
        //     }
        //     $productImage = $variation['product_id'] . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $productImage);
        //     $input['image'] = "$productImage";
        // }
        // Variation::create($input);

        Variation::create([
            'product_id'     => $variation['product_id'],
            'orientation_id' => $variation['orientation_id'],
            'size_id'        => $variation['size_id'],
            'stock'          => $variation['stock']
        ]);

        return redirect()->route('admin-products.variation', $variation['product_id'])->with('success',
        'Variation created successfully.');
    }

    public function variation($id)
    {
        $product = Product::find($id);
        $variations = Variation::with('product', 'size', 'orientation')
        ->where('product_id', $product->id)->get();

        return view('admin-products.variation', [
            'product'    => $product,
            'variations' => $variations,
        ]);
    }

    public function show($productId, $variationId)
    {
        $product = Product::find($productId);
        $variation = Variation::find($variationId);
        $orientation = (strtolower($variation->orientation->name));
        
        return view('admin-products.show', [
            'product' => $product,
            'variation' => $variation,
            'orientation' => $orientation
        ]);
    }

    public function edit($productId, $variationId)
    {
        $product = Product::find($productId);
        $variation = Variation::find($variationId);

        $productCategories = $product->productCategories->pluck('category_id')->toArray();
        $categories = Category::all();

        return view('admin-products.edit',
        compact('product', 'variation', 'categories', 'productCategories'), [
            'method'  => 'POST',
            'action'  => '/admin-products/' . $productId .
             '/variations/' . $variationId . '/update'   
        ]);
    }

    public function update($productId, $variationId)
    {   
        $data = $_POST;
        
        $product = Product::find($productId);
        $variation = Variation::find($variationId);

        $product->update($data);
        $variation->update($data);
       
        $categories = $data['category_id'];
        Product_category::where('product_id', $product->id)->delete();
        foreach ($categories as $index => $data['category_id']) {
            Product_category::create([
                'product_id'  => $product->id,
                'category_id' => $categories[$index],
            ]);
        }

        return redirect()->route('admin-products.index')->with('success',
        'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return Redirect()->route('admin-products.index')->with('success',
        'Product deleted successfully');
    }

    public function destroyVariation($productId, $variationId)
    {   
        $variation = Variation::find($variationId);
 
        $variation->delete();

        return Redirect()->route('admin-products.variation', $variation['product_id'])->with('success',
        'Variation deleted successfully');
    }

}