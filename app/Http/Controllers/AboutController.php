<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AboutController extends Controller
{
    public function index()
    {
        $products = Product::select('img', 'name')->orderBy('create_at', 'desc')->limit(5)->get();

        return view('about', compact('products'));
    }
}
