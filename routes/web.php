<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderStatusController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProductType\ProductTypeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

//Login Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/', function () {
    return view('welcome');
});

//Resources Routes
Route::resource('users', UserController::class)
    ->except(['show'])
    ->middleware('can:users');

Route::resource('products', ProductController::class)
    ->except(['show'])
    ->middleware('can:products');

Route::resource('product-types', ProductTypeController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware('can:products');

Route::resource('orders', OrderController::class)
    ->middleware('auth');
Route::post('/orders/{order}/changestatus', OrderStatusController::class)
    ->name('orders.changestatus')
    ->middleware('auth');
