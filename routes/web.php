<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
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


Route::get('restaurant', [RestaurantController::class, 'show'])->name('restaurant')->middleware('roles:1,2,3');
Route::get('restaurant/create', [RestaurantController::class, 'create'])->middleware('roles:1,2,3');
Route::post('restaurant/create', [RestaurantController::class, 'store'])->middleware('roles:1,2,3');

Route::get('food/create', [FoodController::class, 'create'])->name('food');
Route::post('food/created', [FoodController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
