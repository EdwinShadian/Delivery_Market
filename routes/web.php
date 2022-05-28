<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProductType\ProductTypeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    ->middleware('user');

Route::resource('products', ProductController::class)
    ->except(['show'])
    ->middleware('auth');

Route::resource('product-types', ProductTypeController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');
