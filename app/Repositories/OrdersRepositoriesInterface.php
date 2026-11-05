<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface OrdersRepositoriesInterface
{
    public function getOrders(): Collection;

    public function postOrderItems(int $id, int $orderId);

    public function postOrder(int $id);
}
