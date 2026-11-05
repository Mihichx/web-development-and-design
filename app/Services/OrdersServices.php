<?php

namespace App\Services;

use App\Repositories\OrdersRepositoriesInterface;

class OrdersServices
{
    public function __construct(protected OrdersRepositoriesInterface $ordersRepository) {}

    public function getOrdersProducts()
    {
        return $this->ordersRepository->getOrders();
    }
}
