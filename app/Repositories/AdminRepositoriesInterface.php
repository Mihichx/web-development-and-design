<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

interface AdminRepositoriesInterface
{
    public function getProducts(): Collection;

    public function getProductsId(int $id): Product;
}
