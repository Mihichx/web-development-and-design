<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface AdminRepositoriesInterface
{
    public function getProducts(): Collection;
}
