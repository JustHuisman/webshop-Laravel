<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public function index()
    {
        return view('return');
    }
}
