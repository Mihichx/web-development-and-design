<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartService;

class CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index()
    {
        ['cartProducts' => $cartProducts, 'count' => $count, 'sum' => $sum] = $this->cartService->getProductCart();

        return view('cart', compact('cartProducts', 'count', 'sum'));
    }

    public function clear()
    {
        if (!Cart::where('user_id', auth()->id())->exists()) {
            return redirect()->route('cart.index')->with('error', 'Ваша корзина уже пуста');
        }

        try {
            $this->cartService->deleteAllCartProduct();

            return redirect()->route('cart.index')->with('success', 'Корзина очищена');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Произошла ошибка при очистке: ' . $e->getMessage());
        }
    }
}
