<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Http\Requests\CancelOrderRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Заказы
     */
    public function ordersIndex()
    {
        $orders = Order::select('id', 'user_id', 'order_status_id', 'created_at')->with('user', 'status')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function ordersUpdate(CancelOrderRequest $request, int $id)
    {
        $data = $request->validated();
        $newStatusId = $data['status'];

        $status = OrderStatus::find($newStatusId);
        if (!$status) {
            return redirect()->route('admin.orders.index')->with('error', 'Недопустимый статус заказа');
        }

        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Заказ не найден');
        }

        // TODO: Нужна ещё логика возврата товара при отмене

        $order->update(['order_status_id' => $newStatusId, 'reason_for_cancellation' => $data['cause'] ?? null]);

        return redirect()->route('admin.orders.index')->with('success', 'Статус заказа успешно обновлен');
    }

    /**
     * Продукты
     */
    public function productsIndex()
    {
        return view('admin.products.index');
    }

    public function productsStore()
    {
        return redirect()->route('admin.products.index');
    }

    public function productsUpdate()
    {
        return redirect()->route('admin.products.index');
    }

    public function productsDestroy()
    {
        return redirect()->route('admin.products.index');
    }

    /**
     * Категории
     */
    public function categoriesIndex()
    {
        return view('admin.categories.index');
    }

    public function categoriesStore()
    {
        return redirect()->route('admin.categories.index');
    }

    public function categoriesDestroy()
    {
        return redirect()->route('admin.categories.index');
    }
}
