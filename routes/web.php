<?php

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('/users', 'IndexController')->name('user.index');
    Route::get('/users/create', 'CreateController')->name('user.create');
    Route::post('/users', 'StoreController')->name('user.store');
    Route::get('/users/{user}', 'EditController')->name('user.edit');
    Route::patch('/users/{user}', 'UpdateController')->name('user.update');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
