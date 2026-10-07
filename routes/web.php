<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AboutController::class, 'index'])->name('about');
Route::get('/products', [CatalogController::class, 'index'])->name('products');
Route::get('/products/{product}', [CatalogController::class, 'show'])->name('products.show');
Route::get('/find', [FindController::class, 'index'])->name('find');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.post');
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/orders', [AdminController::class, 'ordersIndex'])->name('orders.index');
        Route::put('/orders/{order}', [AdminController::class, 'ordersUpdate'])->name('orders.update');

        Route::get('/products', [AdminController::class, 'productsIndex'])->name('products.index');
        Route::post('/products', [AdminController::class, 'productsStore'])->name('products.store');
        Route::put('/products/{product}', [AdminController::class, 'productsUpdate'])->name('products.update');
        Route::delete('/products/{product}', [AdminController::class, 'productsDestroy'])->name('products.destroy');

        Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
        Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('categories.store');
        Route::delete('/categories/{category}', [AdminController::class, 'categoriesDestroy'])->name('categories.destroy');
    });
});

Auth::routes();
