<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/tos', [HomeController::class, 'tos'])->name('tos');
Route::get('/home/categories', [HomeController::class, 'categories'])->name('categories');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/return', [ReturnController::class, 'index'])->name('return');

Auth::routes();
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resources([
        'admin-users'   => UsersController::class,
        'admin-returns' => ReturnsController::class
    ]);

    Route::prefix('admin-products')->name('admin-products.')->controller(ProductsController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'variation')->name('variation');
    Route::get('/{id}/variations/create', 'createVariation')->name('createVariation');
    Route::post('/{id}/variations/store', 'storeVariation')->name('storeVariation');
    Route::get('/{id}/variations/{variation}', 'show')->name('show');
    Route::get('/{id}/variations/{variation}/edit', 'edit')->name('edit');
    Route::put('/{id}/variations/{variation}/update', 'update')->name('update');
    Route::get('/{id}/variations/{variation}/destroy', 'destroyVariation')->name('destroy');
    Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });
});


