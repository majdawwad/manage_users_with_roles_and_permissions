<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/products', [ProductController::class ,'index'])->name('index');
    Route::get('/create', [ProductController::class ,'create'])->name('create');
    Route::post('store/', [ProductController::class ,'store'])->name('store');
    Route::get('show/{product}', [ProductController::class ,'show'])->name('show');
    Route::get('edit/{product}', [ProductController::class ,'edit'])->name('edit');
    Route::put('edit/{product}', [ProductController::class ,'update'])->name('update');
    Route::delete('/{product}', [ProductController::class ,'destroy'])->name('destroy');
});
