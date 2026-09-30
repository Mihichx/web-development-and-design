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

        // FIXME: Выбирать сначала новые и сделать проверку на наличие товаров
        $query = Product::select('id', 'name', 'small_description', 'price', 'img'); // ->where('id' > 0)

        if ($request->has('sort_price')) {
            $value = $request->input('sort_price') == 1 ? 'asc' : 'desc';
            $query->orderBy('price', $value)->get();
        }

        $products = $query->paginate(2);

        return view('catalog', compact('products', 'categories'));
    }

    public function indexId(int $id)
    {
        $item = Product::where('id', $id)->select('id', 'name', 'description', 'price', 'img')->firstOrFail();

        return view('product', compact('item'));
    }
}
