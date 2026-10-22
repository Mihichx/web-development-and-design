<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CancelOrderRequest;
use App\Http\Requests\Admin\DestroyCategoryRequest;
use App\Http\Requests\Admin\SortOrderRequest;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Order;
use App\Services\AdminService;
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
    public function ordersIndex(SortOrderRequest $request)
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


    public function categoriesStore(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $categoryName = $data['name'];

        $this->adminService->storeCategory($categoryName);

        return redirect()->route('admin.categories.index')->with('success', 'Категория создана');
    }

    public function categoriesDestroy(DestroyCategoryRequest $request)
    {
        $data = $request->validated();
        $categoryId = $data['id'];

        $this->adminService->deleteCategory($categoryId);

        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена');
    }
}
