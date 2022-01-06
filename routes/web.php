<?php

use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix'=>'admin'], function (){
    Route::get('/', [IndexController::class, 'index'])->name('admin');
    Route::resources([
        'menus' => MenuController::class,
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login/google',[LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[LoginController::class, 'redirectToGoogleCallback']);
