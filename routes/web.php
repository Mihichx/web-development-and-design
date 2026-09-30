<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
// TODO: Подключить контроллеры, сделать как с админкой

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

Route::get('/', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/products', [App\Http\Controllers\CatalogController::class, 'index'])->name('products');
Route::get('/product/{id}', [App\Http\Controllers\CatalogController::class, 'indexId'])->name('product'); // FIXME: Изменить /products/{product}, функцию назвать show и name('products.show')
Route::get('/find', [App\Http\Controllers\FindController::class, 'index'])->name('find');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart_post'); // FIXME: Изменить name('cart.store')
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/orders', [AdminController::class, 'ordersIndex'])->name('orders.index');
        Route::put('/orders', [AdminController::class, 'ordersUpdate'])->name('orders.update');

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
