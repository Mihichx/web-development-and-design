<?php

namespace App\Services;

use App\Repositories\OrdersRepositoriesInterface;
use App\Services\CartService;

class OrdersServices
{
    public function __construct(protected OrdersRepositoriesInterface $ordersRepository, protected CartService $cartService) {}

    public function getOrdersProducts()
    {
        return $this->ordersRepository->getOrders();
    }

    public function createOrder()
    {
        $idUser = auth()->id();
        $orderId = $this->ordersRepository->postOrder($idUser);
        $this->ordersRepository->postOrderItems($idUser, $orderId);
        $this->cartService->deleteAllCartProduct(False);
    }
}
