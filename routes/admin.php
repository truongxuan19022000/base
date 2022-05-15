<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm']);
Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('admin.profile');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class)
        ->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'store' => 'admin.users.store',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.delete'
        ]);
    Route::post('/users/delete', [App\Http\Controllers\Admin\UserController::class, 'deletemany'])->name('admin.users.deletemany');

    // Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    // Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    // Route::post('/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    // Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    // Route::post('/users/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.update');
    // Route::post('/users/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.users.delete');
    // Route::post('/users/delete', [App\Http\Controllers\Admin\UserController::class, 'deletemany'])->name('admin.users.deletemany');
});
