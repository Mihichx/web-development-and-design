<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Category;

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

    public function storeCategory(string $categoryName) {
        Category::create(['name' => $categoryName]);
    }

    public function deleteCategory(int $categoryId) {
        Category::findOrFail($categoryId)->delete();
    }
}
