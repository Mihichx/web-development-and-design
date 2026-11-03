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
}
