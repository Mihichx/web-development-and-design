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
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/find', [App\Http\Controllers\FindController::class, 'index'])->name('find');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Auth::routes();
