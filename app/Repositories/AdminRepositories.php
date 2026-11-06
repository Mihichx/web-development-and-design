<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Product;

class AdminRepositories implements AdminRepositoriesInterface
{
    public function getProducts(): Collection
    {
        return Product::with('category')->get();
    }

    public function getProductsId(int $id): Product
    {
        return Product::with('category')->findOrFail($id);
    }
}
