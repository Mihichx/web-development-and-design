<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AboutController extends Controller
{
    public function index()
    {
        $products = Product::select('img', 'name')->orderBy('created_at', 'desc')->where('quantity', '>', 0)->limit(5)->get();

        return view('about', compact('products'));
    }
}
