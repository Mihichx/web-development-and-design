<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AdminRepositories;
use App\Repositories\AdminRepositoriesInterface;

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
