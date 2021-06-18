<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LanguageController;
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

Route::get('/', [FoodController::class, 'index'])->name('food.index');
Route::post('/', [FoodController::class, 'index'])->name('food.index');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('restaurant', RestaurantController::class);
Route::post('restaurant/{id}/review',[ReviewController::class,'store'])->name('review.store');
Route::post('restaurant/{id}/review/update',[ReviewController::class,'update'])->name('review.update');

Route::get('restaurant/edit/{id}',[RestaurantController::class,'edit'])->name('restaurant.edit');
Route::post('restaurant/edit/{id}',[RestaurantController::class,'update'])->name('restaurant.update');

Route::get('restaurants', [RestaurantController::class,'index'])->name('restaurant.index');
Route::post('restaurants', [RestaurantController::class,'index'])->name('restaurant.index');

Route::get('business', [BusinessController::class, 'showBusiness'])->name('business');

Route::get('restaurant/create', [RestaurantController::class, 'create']);
Route::post('restaurant/create', [RestaurantController::class, 'store']);

Route::get('food/create', [FoodController::class, 'create'])->name('food')->middleware('roles:2');
Route::post('food/create', [FoodController::class, 'store'])->middleware('roles:2');

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/created', [CategoryController::class, 'store']);

Route::get('admin', [AdminController::class, 'index'])->name('admin.users');
Route::get('admin/users/ban/{id}', [AdminController::class, 'banUser'])->name('admin.ban');
Route::get('admin/users/unban/{id}', [AdminController::class, 'unbanUser'])->name('admin.unban');
Route::post('admin/review/delete', [ReviewController::class, 'destroy'])->name('review.destroy');

Route::apiResource('cart', CartController::class);
Route::get('cart', [CartController::class,'index'])->name('cart.index');
Route::post('cart-add', [CartController::class,'store']);
Route::post('cart-remove', [CartController::class,'destroy'])->name('cart.destroy');


Route::get('order', [OrderController::class, 'create'])->name('order.create');
Route::post('order', [OrderController::class, 'store']);

Route::get('myorders', [OrderController::class, 'index'])->name('orders.client');

Route::get('reviews/{id}', [ReviewController::class, 'index'])->name('review.index');


Route::post('food-remove', [FoodController::class, 'destroy'])->name('food.destroy')->middleware('roles:2');
Route::get('food-edit/{id}', [FoodController::class, 'edit'])->name('food.edit')->middleware('roles:2');
Route::post('food-edit/{id}', [FoodController::class, 'update'])->name('food.update')->middleware('roles:2');


Route::get('lang/{locale}',LanguageController::class);
