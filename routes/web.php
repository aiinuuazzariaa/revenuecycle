<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountNumberController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\PihutangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurnalUmumController;
use App\Http\Controllers\BukuBesarController;

Route::get('/auth/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('guest')->name('processLogin');
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:superadmin|cashier'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/account-number', [AccountNumberController::class, 'index'])->name('account-number');
    Route::get('/create-account-number', [AccountNumberController::class, 'create'])->name('account-number-create');
    Route::post('/create-account-number', [AccountNumberController::class, 'store'])->name('account-number-store');
    Route::get('/update-account-number/{id}', [AccountNumberController::class, 'edit'])->name('account-number-edit');
    Route::put('/update-account-number/{id}', [AccountNumberController::class, 'update'])->name('account-number-update');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/create-customer', [CustomerController::class, 'create'])->name('customer-create');
    Route::post('/create-customer', [CustomerController::class, 'store'])->name('customer-store');
    Route::get('/update-customer/{id}', [CustomerController::class, 'edit'])->name('customer-edit');
    Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->name('customer-update');

    Route::get('/income', [IncomeController::class, 'index'])->name('income');
    Route::get('/create-income', [IncomeController::class, 'create'])->name('income-create');
    Route::post('/create-income', [IncomeController::class, 'store'])->name('income-store');

    Route::get('/pihutang', [PihutangController::class, 'index'])->name('pihutang');
    Route::get('/create-pihutang', [PihutangController::class, 'create'])->name('pihutang-create');
    Route::post('/create-pihutang', [PihutangController::class, 'store'])->name('pihutang-store');

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/create-product', [ProductController::class, 'create'])->name('product-create');
    Route::post('/create-product', [ProductController::class, 'store'])->name('product-store');
    Route::get('/update-product/{id}', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product-update');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/create-permission', [PermissionController::class, 'create'])->name('permission-create');
    Route::post('/create-permission', [PermissionController::class, 'store'])->name('permission-store');
    Route::get('/update-permission/{id}', [PermissionController::class, 'edit'])->name('permission-edit');
    Route::put('/update-permission/{id}', [PermissionController::class, 'update'])->name('permission-update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permission-destroy');

    Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
    Route::get('/create-role', [App\Http\Controllers\RolesController::class, 'create'])->name('role-create');
    Route::post('/create-role', [App\Http\Controllers\RolesController::class, 'store'])->name('role-store');
    Route::get('/update-role/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('role-edit');
    Route::put('/update-role/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('role-update');
    Route::delete('/roles/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role-destroy');

    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/create-user', [App\Http\Controllers\UserController::class, 'create'])->name('user-create');
    Route::post('/create-user', [App\Http\Controllers\UserController::class, 'store'])->name('user-store');
    Route::get('/update-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user-edit');
    Route::put('/update-user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user-update');
    Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user-destroy');

    Route::get('/jurnal-umum', [JurnalUmumController::class, 'index'])->name('jurnal-umum');

    Route::get('/buku-besar', [BukuBesarController::class, 'index'])->name('buku-besar');
});

// Route::middleware(['auth', 'role:superadmin|cashier'])->group(function () {
//     Route::get('/', function () {
//         return view('pages.dashboard');
//     })->name('dashboard');

//     Route::get('/income', [IncomeController::class, 'index'])->name('income');
//     Route::get('/create-income', [IncomeController::class, 'create'])->name('income-create');
//     Route::post('/create-income', [IncomeController::class, 'store'])->name('income-store');

//     Route::get('/pihutang', [PihutangController::class, 'index'])->name('pihutang');
//     Route::get('/create-pihutang', [PihutangController::class, 'create'])->name('pihutang-create');
//     Route::post('/create-pihutang', [PihutangController::class, 'store'])->name('pihutang-store');
// });
