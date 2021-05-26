<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;

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

Route::resource('restaurant/create', BookController::class);


Route::get('restaurant', [RestaurantController::class, 'show'])->name('restaurant');
Route::get('restaurant/create', [RestaurantController::class, 'create']);
Route::post('restaurant/create', [RestaurantController::class, 'store']);

Route::get('food/create', [FoodController::class, 'create'])->name('food')->middleware('roles:1');
Route::post('food/created', [FoodController::class, 'store'])->middleware('roles:1');

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/created', [CategoryController::class, 'store']);

Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
