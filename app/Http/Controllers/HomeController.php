<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
        // foreach (Product::all() as $product) {
        //     echo $product->name;
        // }

        return view('home');

    }

    public function tos()
    {
        return view('tos');
    }


}
