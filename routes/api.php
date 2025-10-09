<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
    'customer' => CustomerController::class,
]);

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer', [CustomerController::class, 'create']);
Route::get('/customer/id', [CustomerController::class, 'show']);
Route::put('/customer/id', [CustomerController::class, 'update']);
Route::delete('/customer/id', [CustomerController::class, 'destroy']);
