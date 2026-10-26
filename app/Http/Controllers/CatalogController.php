<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use App\Http\Requests\CatalogSortRequest;
use App\Http\Requests\CatalogStoreRequest;
use App\Http\Requests\CatalogUpdateRequest;

class CatalogController extends Controller
{
    private CatalogService $catalogService;

    public function __construct(CatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }

    public function index(CatalogSortRequest $request)
    {
        $data = $request->validated();
        $sortPriceValue = $data['sort_price'] ?? null;
        $sortYearValue = $data['sort_year'] ?? null;
        $sortCategoryValue = $data['sort_category'] ?? null;
        $searchValue = $data['search'] ?? '';

        ['products' => $products, 'categories' => $categories, 'cart' => $cart] = $this->catalogService->getProductCatalog($sortPriceValue, $sortYearValue, $sortCategoryValue, $searchValue);

        return view('catalog', compact('products', 'categories', 'cart'));
    }

    public function show(int $id)
    {
        ['product' => $product, 'cart' => $cart] = $this->catalogService->showProduct($id);

        return view('product', compact('product', 'cart'));
    }

    public function store(CatalogStoreRequest $request)
    {
        $data = $request->validated();
        $redirectTo = $data['return_url'] ?? route('catalog.index');
        $productId = $data['product_id'];

        $this->catalogService->createProductCart($productId);

        return redirect()->to($redirectTo)->with('success', 'Товар добавлен');
    }

    public function update(CatalogUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $redirectTo = $data['return_url'] ?? route('catalog.index');
        $plusValue = !empty($data['plus']) ? abs($data['plus']) : 0;
        $minusValue = !empty($data['minus']) ? abs($data['minus']) : 0;

        try {
            $this->catalogService->updateQuantityProductCart($id, $plusValue, $minusValue);

            return redirect()->to($redirectTo)->with('success', 'Товар изменён');
        } catch (\Exception $e) {
            return redirect()->to($redirectTo)->with('error', $e->getMessage());
        }
    }
}
