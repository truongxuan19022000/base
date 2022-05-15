<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Vendor\LoginController::class, 'showLoginForm']);
Route::post('/login', [App\Http\Controllers\Vendor\LoginController::class, 'login'])->name('vendor.login');
Route::get('register', [\App\Http\Controllers\Vendor\VendorRegister::class, 'showRegisterForm']);
Route::post('register/authentication',[App\Http\Controllers\Vendor\VendorRegister::class,'vendorRegistration'])->name('register.authentication');

Route::middleware(['auth:vendor'])->group(function () {
    Route::get('logout', [App\Http\Controllers\Vendor\LoginController::class, 'logout'])->name('vendor.logout');
    Route::get('/profile', [App\Http\Controllers\Vendor\UserController::class, 'profile'])->name('vendor.profile');
    Route::get('/product', [App\Http\Controllers\Vendor\ProductController::class, 'index'])->name('vendor.product');
    Route::get('/', [App\Http\Controllers\Vendor\DashboardController::class, 'index'])->name('vendor.dashboard');
    Route::get('/email/verify', function () {
        return "Tài khoản chưa được xác thực";
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('vendor.register.plan');
    })->middleware(['signed'])->name('verification.verify');

    Route::middleware(['verified'])->group(function () {
        Route::get('register/plan', [\App\Http\Controllers\Vendor\VendorRegister::class, 'showPlan'])->name('vendor.register.plan');
    });
});

