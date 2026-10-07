<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\OrderStatus;

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
        $orders = OrderProduct::select('id', 'user_id', 'value', 'order_status_id', 'order_date')->with('user', 'status')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function ordersUpdate(Request $request, int $id)
    {
        $newStatusId = $request->input('status');

        $status = OrderStatus::find($newStatusId);
        if (!$status) {
            return redirect()->route('admin.orders.index')->with('error', 'Недопустимый статус заказа');
        }

        $order = OrderProduct::find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Заказ не найден');
        }
        
        $order->update(['order_status_id' => $newStatusId, 'reason_for_cancellation' => $request->input('cause')]);

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
