<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountNumberController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('/pages/dashboard');
})->name('dashboard');

Route::get('/profile', function () {
    return view('/pages/profile-static');
})->name('profile');

Route::get('/user-management', function () {
    return view('/pages/user-management');
})->name('user-management');

Route::get('/account-number', [AccountNumberController::class, 'index'])->name('account-number');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

Route::get('/income', [IncomeController::class, 'index'])->name('income');

Route::get('/product', [ProductController::class, 'index'])->name('product');
