<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CancelOrderRequest;
use App\Http\Requests\Admin\DestroyCategoryRequest;
use App\Http\Requests\Admin\DestroyProductRequest;
use App\Http\Requests\Admin\SortOrderRequest;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\AdminService;
use App\Models\Category;

class AdminController extends Controller
{
    public function __construct(protected AdminService $adminService) {}

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
        $cause = $data['cause'];

        $this->adminService->updateOrderAdmin($id, $newStatusId, $cause);

        return redirect()->route('admin.orders.index')->with('success', 'Статус заказа успешно обновлен');
    }

    /**
     * Продукты
     */
    public function productsIndex()
    {
        $products = $this->adminService->getProductsAdmin();

        return view('admin.products.index', compact('products'));
    }

    public function productsCreate()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function productsEdit(int $id)
    {
        $product = $this->adminService->getProductAdmin($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function productsStore(ProductRequest $request)
    {
        $data = $request->validated();

        $this->adminService->createProductAdmin($data);

        return redirect()->route('admin.products.index');
    }

    public function productsUpdate(ProductRequest $request, int $id)
    {
        $data = $request->validated();

        $this->adminService->updateProductAdmin($id, $data);

        return redirect()->route('admin.products.index');
    }

    public function productsDestroy(DestroyProductRequest $request)
    {
        $data = $request->validated();
        $productId = $data['id'];

        $this->adminService->deleteProduct($productId);

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
