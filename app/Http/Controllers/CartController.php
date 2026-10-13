<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartProducts = Cart::where('user_id', auth()->id())->with('product')->get();
        $count = $cartProducts->sum(function ($cartProduct) {
            return $cartProduct->quantity ?? 0;
        });
        $sum = $cartProducts->sum(function ($cartProduct) {
            return $cartProduct->product->price * $cartProduct->quantity ?? 0;
        });

        return view('cart', compact('cartProducts', 'count', 'sum'));
    }

    public function clear()
    {
        if (!Cart::where('user_id', auth()->id())->exists()) {
            return redirect()->route('cart.index')->with('error', 'Ваша корзина уже пуста');
        }

        try {
            DB::transaction(function () {
                $cartItems = Cart::where('user_id', auth()->id())->with('product')->lazy();

                foreach ($cartItems as $cartProduct) {
                    if ($cartProduct->product) {
                        $cartProduct->product->increment('quantity', $cartProduct->quantity);
                    }
                    $cartProduct->delete();
                }
            });

            return redirect()->route('cart.index')->with('success', 'Корзина очищена');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Произошла ошибка при очистке: ' . $e->getMessage());
        }
    }
}
