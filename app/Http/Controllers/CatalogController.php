<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $products = Product::select('id', 'name', 'small_description', 'price', 'img')->paginate(2);
        return view('catalog', compact('products', 'categories'));
    }

    public function indexId(int $id)
    {
        $item = Product::where('id', $id)->select('id', 'name', 'description', 'price', 'img')->firstOrFail();

        return view('product', compact('item'));
    }
}
