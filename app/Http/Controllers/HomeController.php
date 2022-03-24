<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Category;

// use App\Models\Product;
// use App\Models\Product_size;
// use App\Models\Variation;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        // $categories = Category::all();
        // $products = Product::all();
        // $variations = Variation::all();

        return view('home', 
            // 'categories' => $categories,
            // 'products' => $products,
            // 'variations' => $variations,
        );
    }

    public function tos()
    {
        return view('tos');
    }

    public function categories()
    {
        // if (!Request::ajax()) {
        //     return;
        // }

        try {
            $category = new Category;
            $categories = $category->all();

            $success = true;
            $message = "Success";
        } catch (Exception $e) {
            $categories = null;
            $success = false;
            $message = $e->getMessage();
        }

        echo json_encode([
            'success'   => $success,
            'message'   => $message,
            'categories'  => $categories,
        ]);
    }


}
