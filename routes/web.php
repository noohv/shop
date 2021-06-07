<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [FoodController::class, 'index'])->name('home');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('restaurant/create', RestaurantController::class);
Route::resource('restaurant', RestaurantController::class);

Route::get('restaurants', [RestaurantController::class,'index'])->name('restaurants');

Route::get('restaurant/create', [RestaurantController::class, 'create']);
Route::post('restaurant/create', [RestaurantController::class, 'store']);

Route::get('food/create', [FoodController::class, 'create'])->name('food')->middleware('roles:1,2');
Route::post('food/created', [FoodController::class, 'store'])->middleware('roles:1,2');

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/created', [CategoryController::class, 'store']);

Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users');

// Route::apiResource('cart', CartController::class);
Route::get('cart', [CartController::class,'index'])->name('cart.index');
Route::post('cart', [CartController::class,'store']);
Route::post('/cart-item-delete', [CartController::class,'destroy']);


Route::get('order', [OrderController::class, 'create'])->name('order.create');
Route::post('order', [OrderController::class, 'store']);

Route::get('myorders', [OrderController::class, 'index'])->name('orders.client');

