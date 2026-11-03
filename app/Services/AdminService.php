<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\AdminRepositoriesInterface;

class AdminService
{
    public function __construct(protected AdminRepositoriesInterface $adminRepository) {}

    public function getOrdersAdmin(?int $sort)
    {
        $query = Order::select('id', 'user_id', 'order_status_id', 'created_at');

        if ($sort) {
            $query->where('order_status_id', $sort);
        }

        $orders = $query->with('user', 'status')->get();

        return $orders;
    }

    public function storeCategory(string $categoryName)
    {
        Category::create(['name' => $categoryName]);
    }

    public function deleteCategory(int $categoryId)
    {
        Category::findOrFail($categoryId)->delete();
    }

    public function getProductsAdmin()
    {
        $products = $this->adminRepository->getProducts();

        return $products;
    }

    public function getProductAdmin(int $id)
    {
        $product = $this->adminRepository->getProductsId($id);

        return $product;
    }

    public function updateProductAdmin(int $id, array $data)
    {
        Product::findOrFail($id)->update($data);
    }

    public function createProductAdmin(array $data)
    {
        Product::create($data);
    }

    public function deleteProduct(int $productId)
    {
        Product::findOrFail($productId)->delete();
    }
}
