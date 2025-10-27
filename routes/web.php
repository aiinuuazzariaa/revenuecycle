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
Route::get('/add-account-number', [AccountNumberController::class, 'create'])->name('account-number-create');
Route::post('/add-account-number', [AccountNumberController::class, 'store'])->name('account-number-store');
Route::get('/edit-account-number/{id}', [AccountNumberController::class, 'show'])->name('account-number-show');
Route::post('/edit-account-number/{id}', [AccountNumberController::class, 'update'])->name('account-number-update');
Route::delete('/delete-account-number/{id}', [AccountNumberController::class, 'delete'])->name('account-number-delete');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/add-customer', [CustomerController::class, 'create'])->name('customer-create');
Route::post('/add-customer', [CustomerController::class, 'store'])->name('customer-store');
Route::get('/edit-customer/{id}', [CustomerController::class, 'show'])->name('customer-show');
Route::post('/edit-customer/{id}', [CustomerController::class, 'update'])->name('customer-update');

Route::get('/income', [IncomeController::class, 'index'])->name('income');
Route::get('/add-income', [IncomeController::class, 'create'])->name('income-create');
Route::post('/add-income', [IncomeController::class, 'store'])->name('income-store');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/add-product', [ProductController::class, 'create'])->name('product-create');
Route::post('/add-product', [ProductController::class, 'store'])->name('product-store');
Route::get('/edit-product/{id}', [ProductController::class, 'show'])->name('product-show');
Route::post('/edit-product/{id}', [ProductController::class, 'update'])->name('product-update');
