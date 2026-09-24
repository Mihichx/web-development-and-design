<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
        return view('admin.orders.index');
    }

    public function ordersUpdate(Request $request)
    {
        $request = $request->all();

        if ($request['status'] == 0) {
            echo $request['cause'];
        }
        echo $request['status'];
        exit;

        return redirect()->route('admin.orders.index');
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
