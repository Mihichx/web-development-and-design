<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    private function cartUser(): Collection
    {
        if (auth()->check()) {
            return Cart::where('user_id', auth()->id())->get();
        }
        return collect();
    }

    public function index(Request $request)
    {
        $cart = $this->cartUser();
        $categories = Category::all();
        $productQuery = Product::select('id', 'name', 'small_description', 'price', 'quantity', 'img')->where('quantity', '>', 0);

        if ($request->filled('sort_price')) {
            $sortValue = $request->input('sort_price');
            if ($sortValue == 1) {
                $productQuery->orderBy('price', 'asc');
            } elseif ($sortValue == 2) {
                $productQuery->orderBy('price', 'desc');
            }
        }

        if ($request->filled('sort_year')) {
            $sortValue = $request->input('sort_year');
            if ($sortValue == 1) {
                $productQuery->orderBy('release_at', 'asc');
            } elseif ($sortValue == 2) {
                $productQuery->orderBy('release_at', 'desc');
            }
        }

        if ($request->filled('sort_category') && $request->input('sort_category') != 0) {
            $categoryId = $request->input('sort_category');
            $productQuery->where('category_id', $categoryId);
        }

        $products = $productQuery->where('name', 'LIKE', '%' . $request->input('search') . '%')->orderBy('created_at', 'desc')->paginate(4);

        return view('catalog', compact('products', 'categories', 'cart'));
    }

    public function show(int $id)
    {
        $cart = $this->cartUser();
        $product = Product::select('id', 'name', 'description', 'country', 'release_at', 'model', 'quantity', 'price', 'img')->findOrFail($id);

        return view('product', compact('product', 'cart'));
    }

    public function store(Request $request)
    {
        $redirectTo = $request->input('return_url', route('catalog.index'));
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        $productQuantity = $product->quantity;

        if ($productQuantity <= 0) {
            return redirect()->route('catalog.index')->with('error', 'Товара нет в наличии');
        }

        Cart::upsert(
            [
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => 1
            ],
            ['user_id', 'product_id'], // Указываем поля нашего уникального индекса
            ['quantity' => \DB::raw('quantity + 1')] // Если запись уже есть — прибавляем 1 к текущему количеству
        );

        $product->decrement('quantity');

        return redirect()->to($redirectTo)->with('success', 'Товар добавлен');
    }

    public function update(Request $request, int $id)
    {
        $redirectTo = $request->input('return_url', route('catalog.index'));
        $plusValue = $request->filled('plus') ? abs((int)$request->input('plus')) : 0;
        $minusValue = $request->filled('minus') ? abs((int)$request->input('minus')) : 0;

        try {
            DB::transaction(function () use ($id, $plusValue, $minusValue) {
                $cartProduct = Cart::where('product_id', $id)
                    ->where('user_id', auth()->id())
                    ->lockForUpdate()
                    ->firstOrFail();

                $product = $cartProduct->product()->lockForUpdate()->firstOrFail();

                if ($plusValue > 0) {
                    if ($product->quantity < $plusValue) {
                        throw new \Exception('На складе нет нужного количества товара');
                    }

                    $cartProduct->increment('quantity', $plusValue);
                    $product->decrement('quantity', $plusValue);
                }

                if ($minusValue > 0) {
                    if ($cartProduct->quantity <= $minusValue) {
                        $actualCartQuantity = $cartProduct->quantity;
                        $product->increment('quantity', $actualCartQuantity);
                        $cartProduct->delete();
                    } else {
                        $cartProduct->decrement('quantity', $minusValue);
                        $product->increment('quantity', $minusValue);
                    }
                }
            });

            return redirect()->to($redirectTo)->with('success', 'Товар изменён');
        } catch (\Exception $e) {
            return redirect()->to($redirectTo)->with('error', $e->getMessage());
        }
    }
}
