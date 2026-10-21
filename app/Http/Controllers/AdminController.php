<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Http\Requests\CancelOrderRequest;
use App\Services\AdminService;
use App\Http\Requests\AdminOrderRequest;
use App\Models\Category;

class AdminController extends Controller
{
    private AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('admin.index');
    }

    /**
     * Заказы
     */
    public function ordersIndex(AdminOrderRequest $request)
    {
        $data = $request->validated();
        $sort = $data['sort'] ?? null;

        $orders = $this->adminService->getOrdersAdmin($sort);

        return view('admin.orders.index', compact('orders'));
    }

    public function ordersUpdate(CancelOrderRequest $request)
    {
        $data = $request->validated();
        $id = $data['id'];
        $newStatusId = $data['status'];

        // TODO: Нужна ещё логика возврата товара при отмене

        Order::find($id)->update(['order_status_id' => $newStatusId, 'reason_for_cancellation' => $data['cause'] ?? null]);

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
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
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
