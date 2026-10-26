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

Route::get('/', [AboutController::class, 'index'])->name('about.index');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/product/{id}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/find', [FindController::class, 'index'])->name('find.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CatalogController::class, 'store'])->name('cart.store');
    Route::put('/cart/{id}', [CatalogController::class, 'update'])->name('cart.update'); // TODO: Изменить вид запроса cart и поменять на patch
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        // Заказы
        Route::get('/orders', [AdminController::class, 'ordersIndex'])->name('orders.index');
        Route::put('/orders/{order}', [AdminController::class, 'ordersUpdate'])->name('orders.update');

        // Товары
        Route::get('/products', [AdminController::class, 'productsIndex'])->name('products.index');

        Route::get('/products/create', [AdminController::class, 'productsCreate'])->name('products.create');
        Route::post('/products', [AdminController::class, 'productsStore'])->name('products.store');

        Route::get('/products/{product}/edit', [AdminController::class, 'productsEdit'])->name('products.edit');

        Route::patch('/products/{product}', [AdminController::class, 'productsUpdate'])->name('products.update');
        Route::delete('/products/{product}', [AdminController::class, 'productsDestroy'])->name('products.destroy');

        // Категории
        Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
        Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('categories.store');
        Route::delete('/categories/{category}', [AdminController::class, 'categoriesDestroy'])->name('categories.destroy');
    });
});

Auth::routes();
