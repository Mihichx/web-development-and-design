<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

class CatalogService
{
    private function cartUser(): Collection
    {
        if (auth()->check()) {
            return Cart::where('user_id', auth()->id())->get();
        }
        return collect();
    }

    public function getProductCatalog(?int $sortPriceValue, ?int $sortYearValue, ?int $sortCategoryValue, ?string $searchValue)
    {
        $cart = $this->cartUser();
        $categories = Category::all();
        $productQuery = Product::select('id', 'name', 'small_description', 'price', 'quantity', 'img')->where('quantity', '>', 0);

        if ($sortPriceValue) {
            if ($sortPriceValue == 1) {
                $productQuery->orderBy('price', 'asc');
            } elseif ($sortPriceValue == 2) {
                $productQuery->orderBy('price', 'desc');
            }
        }

        if ($sortYearValue) {
            if ($sortYearValue == 1) {
                $productQuery->orderBy('release_at', 'asc');
            } elseif ($sortYearValue == 2) {
                $productQuery->orderBy('release_at', 'desc');
            }
        }

        if ($sortCategoryValue && $sortCategoryValue != 0) {
            $productQuery->where('category_id', $sortCategoryValue);
        }

        $products = $productQuery->where('name', 'LIKE', '%' . $searchValue . '%')->orderBy('created_at', 'desc')->paginate(4);

        return ['products' => $products, 'categories' => $categories, 'cart' => $cart];
    }

    public function showProduct(int $id)
    {
        $cart = $this->cartUser();
        $product = Product::select('id', 'name', 'description', 'country', 'release_at', 'model', 'quantity', 'price', 'img')->findOrFail($id);

        return ['cart' => $cart, 'product' => $product];
    }

    public function createProductCart(int $productId)
    {
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
    }

    public function updateQuantityProductCart(int $id, int $plusValue, int $minusValue)
    {
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
    }
}
