<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function getProductCart()
    {
        $cartProducts = Cart::where('user_id', auth()->id())->with('product')->get();
        $count = $cartProducts->sum(function ($cartProduct) {
            return $cartProduct->quantity ?? 0;
        });
        $sum = $cartProducts->sum(function ($cartProduct) {
            return $cartProduct->product->price * $cartProduct->quantity ?? 0;
        });

        return ['cartProducts' => $cartProducts, 'count' => $count, 'sum' => $sum];
    }

    public function deleteAllCartProduct()
    {
        DB::transaction(function () {
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->lazy();

            foreach ($cartItems as $cartProduct) {
                if ($cartProduct->product) {
                    $cartProduct->product->increment('quantity', $cartProduct->quantity);
                }
                $cartProduct->delete();
            }
        });
    }
}
