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

Route::group(['namespace' => 'App\Http\Controllers\User', 'middleware' => 'user'], function () {
    Route::get('/users', 'IndexController')->name('users.index');
    Route::get('/users/create', 'CreateController')->name('users.create');
    Route::post('/users', 'StoreController')->name('users.store');
    Route::get('/users/{user}', 'EditController')->name('users.edit');
    Route::patch('/users/{user}', 'UpdateController')->name('users.update');
    Route::delete('/users/{user}', 'DestroyController')->name('users.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
