<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::group(['middleware' => ['auth']], function(){
    Route::post('/reserve', [ReserveController::class, 'create'])->name('reserve.create');
    Route::get('/reserve/delete', [ReserveController::class, 'delete'])->name('reserve.delete');
    Route::get('/farorite/{shop_id}', [FavoriteController::class, 'create'])->name('favorite.create'); 
    Route::get('/farorite/delete/{shop_id}', [FavoriteController::class, 'delete'])->name('favorite.delete'); 
    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});