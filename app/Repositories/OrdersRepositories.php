<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Collection;
use App\Models\Order;
use App\Models\OrderProduct;

class OrdersRepositories implements OrdersRepositoriesInterface
{
    public function getOrders(): Collection
    {
        return Order::with('products')->with('status')->where('user_id', auth()->id())->get();
    }

    public function postOrderItems(int $id, int $orderId)
    {
        $productsCart = Cart::where('user_id', $id)->with('product')->get();
        $dataToInsert = [];

        foreach ($productsCart as $productCart) {
            $dataToInsert[] = [
                'order_id' => $orderId,
                'product_id' => $productCart->product->id,
                'quantity' => $productCart->quantity,
                'price_at_purchase' => $productCart->product->price,
            ];
        }

        OrderProduct::insert($dataToInsert);
    }

    public function postOrder(int $id)
    {
        $order = Order::create(['user_id' => $id, 'order_status_id' => 1]);
        return $order->id;
    }
}
