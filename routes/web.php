<?php

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
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index']);

Route::namespace('web')->group(function () {
    Route::get('/login', [App\Http\Controllers\Web\LoginController::class, 'showLoginForm']);
    Route::post('/login', [App\Http\Controllers\Web\LoginController::class, 'login'])->name('login');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', [App\Http\Controllers\Web\UserController::class, 'profile']);
    });
});
