<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ReturnsController;

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
Route::middleware('auth')->prefix('admin')->group(function() {  //middleware is not used yet
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('users', UserController::class)->names('admin.users');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/tos', [HomeController::class, 'tos'])->name('tos');
Route::get('/home/categories', [HomeController::class, 'categories'])->name('categories');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/return', [ReturnController::class, 'index'])->name('return');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout'); //delete this line and put it to middleware later

Route::get('/admin-products', [ProductsController::class, 'index'])->name('admin-products.index');

Route::get('/admin-products/create', [ProductsController::class, 'create'])->name('admin-products.create');
Route::post('/admin-products/store', [ProductsController::class, 'store'])->name('admin-products.store');
Route::get('/admin-products/{id}', [ProductsController::class, 'variation'])->name('admin-products.variation');
Route::get('/admin-products/{id}/variation', [ProductsController::class, 'show'])->name('admin-products.show');
Route::get('/admin-products/{id}/edit', [ProductsController::class, 'edit'])->name('admin-products.edit');
Route::put('/admin-products/{id}/update', [ProductsController::class, 'update'])->name('admin-products.update');
Route::get('/admin-products/{id}/destroy', [ProductsController::class, 'destroy'])->name('admin-products.destroy');

Route::resource('/admin-users', UsersController::class)->names('admin-users');
Route::resource('/admin-returns', ReturnsController::class)->names('admin-returns');




