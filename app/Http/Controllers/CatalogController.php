<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::select('id', 'name', 'small_description', 'price', 'img')->where('quantity', '>', 0);

        if ($request->filled('sort_price')) {
            $value = $request->input('sort_price');
            if ($value == 1) {
                $query->orderBy('price', 'asc')->get();
            } elseif ($value == 2) {
                $query->orderBy('price', 'desc')->get();
            }
        }

        if ($request->filled('sort_year')) {
            $value = $request->input('sort_year');
            if ($value == 1) {
                $query->orderBy('release_at', 'asc')->get();
            } elseif ($value == 2) {
                $query->orderBy('release_at', 'desc')->get();
            }
        }

        if ($request->filled('sort_category') && $request->input('sort_category') != 0) {
            $value = $request->input('sort_category');
            $query->where('category_id', $value)->get();
        }

        $products = $query->where('name', 'LIKE', '%' . $request->input('search') . '%')->orderBy('create_at', 'desc')->paginate(2);

        return view('catalog', compact('products', 'categories'));
    }

    public function show(int $id)
    {
        $item = Product::where('id', $id)->select('id', 'name', 'description', 'price', 'img')->firstOrFail();

        return view('product', compact('item'));
    }
}
