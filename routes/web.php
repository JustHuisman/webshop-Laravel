<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'fetchProducts']);

Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->names('admin.users');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/tos', [HomeController::class, 'tos'])->name('tos');
Route::get('/home/categories', [HomeController::class, 'categories'])->name('categories');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/return', [ReturnController::class, 'index'])->name('return');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin-products', [AdminController::class, 'products'])->name('admin-products');
Route::get('/admin-users', [AdminController::class, 'users'])->name('admin-users');
Route::get('/admin-returns', [AdminController::class, 'returns'])->name('admin-returns');
