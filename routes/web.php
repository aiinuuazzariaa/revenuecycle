<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountNumberController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/auth/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('guest')->name('processLogin');
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/account-number', [AccountNumberController::class, 'index'])->name('account-number');
    Route::get('/create-account-number', [AccountNumberController::class, 'create'])->name('account-number-create');
    Route::post('/create-account-number', [AccountNumberController::class, 'store'])->name('account-number-store');
    Route::get('/update-account-number/{id}', [AccountNumberController::class, 'show'])->name('account-number-show');
    Route::post('/update-account-number/{id}', [AccountNumberController::class, 'update'])->name('account-number-update');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/create-customer', [CustomerController::class, 'create'])->name('customer-create');
    Route::post('/create-customer', [CustomerController::class, 'store'])->name('customer-store');
    Route::get('/update-customer/{id}', [CustomerController::class, 'show'])->name('customer-show');
    Route::post('/update-customer/{id}', [CustomerController::class, 'update'])->name('customer-update');

    Route::get('/income', [IncomeController::class, 'index'])->name('income');
    Route::get('/create-income', [IncomeController::class, 'create'])->name('income-create');
    Route::post('/create-income', [IncomeController::class, 'store'])->name('income-store');

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/create-product', [ProductController::class, 'create'])->name('product-create');
    Route::post('/create-product', [ProductController::class, 'store'])->name('product-store');
    Route::get('/update-product/{id}', [ProductController::class, 'show'])->name('product-show');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product-update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/income', [IncomeController::class, 'index'])->name('income');
    Route::get('/create-income', [IncomeController::class, 'create'])->name('income-create');
    Route::post('/create-income', [IncomeController::class, 'store'])->name('income-store');
});
