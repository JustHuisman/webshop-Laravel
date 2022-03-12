<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Category;
use App\Models\Product_category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // foreach (Category::all() as $category) {
        //     echo $category->name;
        // }
        
        return view('home');

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
