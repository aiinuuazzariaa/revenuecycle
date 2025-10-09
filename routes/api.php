<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer', [CustomerController::class, 'create']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::put('/customer/{customer}', [CustomerController::class, 'update']);
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'create']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/product/{product}', [ProductController::class, 'update']);
Route::delete('/product/{product}', [ProductController::class, 'destroy']);
