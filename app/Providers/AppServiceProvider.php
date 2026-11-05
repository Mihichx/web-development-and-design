<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AdminRepositories;
use App\Repositories\AdminRepositoriesInterface;
use App\Repositories\OrdersRepositories;
use App\Repositories\OrdersRepositoriesInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminRepositoriesInterface::class, AdminRepositories::class);
        $this->app->bind(OrdersRepositoriesInterface::class, OrdersRepositories::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
