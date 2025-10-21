<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountNumberController;
use App\Http\Controllers\IncomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer', [CustomerController::class, 'create']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::put('/customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'create']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/account-number', [AccountNumberController::class, 'index']);
Route::post('/account-number', [AccountNumberController::class, 'create']);
Route::get('/account-number/{id}', [AccountNumberController::class, 'show']);
Route::put('/account-number/{id}', [AccountNumberController::class, 'update']);
Route::delete('/account-number/{id}', [AccountNumberController::class, 'destroy']);

Route::get('/income', [IncomeController::class, 'index']);
Route::post('/income', [IncomeController::class, 'create']);
Route::get('/income/{id}', [IncomeController::class, 'show']);
Route::put('/income/{id}', [IncomeController::class, 'update']);
Route::delete('/income/{id}', [IncomeController::class, 'destroy']);
