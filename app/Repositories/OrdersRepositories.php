<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Order;

class OrdersRepositories implements OrdersRepositoriesInterface
{
    public function getOrders(): Collection
    {
        return Order::with('products')->where('user_id', auth()->id())->get();
    }

    public function postOrderItems()
    {

    }

    public function postOrder()
    {

    }
}
