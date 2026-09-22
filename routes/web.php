<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/product/{id}', [App\Http\Controllers\CatalogController::class, 'indexId'])->name('product');
Route::get('/find', [App\Http\Controllers\FindController::class, 'index'])->name('find');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cartPost');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Auth::routes();
