<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public function index()
    {
    

        return view('admin-returns.index');
    }

    public function edit()
    {
        
    }
}
