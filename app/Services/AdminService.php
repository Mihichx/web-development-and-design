<?php

namespace App\Services;

use App\Models\Order;

class AdminService
{
    public function getOrdersAdmin(?int $sort) {
        $query = Order::select('id', 'user_id', 'order_status_id', 'created_at');

        if ($sort) {
            $query->where('order_status_id', $sort);
        }

        $orders = $query->with('user', 'status')->get();

        return $orders;
    }
}
