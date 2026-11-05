<?php

namespace App\Http\Controllers;

use App\Services\OrdersServices;

class OrdersController extends Controller
{
    public function __construct(protected OrdersServices $ordersService) {}

    public function index()
    {
        $orders = $this->ordersService->getOrdersProducts();

        return view('orders', compact('orders'));
    }

    public function store()
    {
        $this->ordersService->createOrder();

        return redirect()->route('orders.index');
    }
}
