<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductController::class)->middleware(IsLogin::class)->group(function () {
    Route::get('/home', 'getHome');
    Route::middleware(IsAdmin::class)->group(function () {
        Route::get('/create-product', 'getCreateProduct');
        Route::post('/store-product', 'storeProduct');
        Route::get('/update-product/{id}', 'updateProduct');
        Route::post('/edit-product/{id}', 'editProduct');
        Route::post('/delete-product/{id}', 'deleteProduct');
    });
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/create-order/{ProductId}', 'getCreateOrder')->name('getCreateOrder');
    Route::post('/store-order/{ProductId}', 'storeOrder')->name('storeOrder');
    Route::get('/view-orders', 'getAllOrders')->name('getAllOrders');
});

Route::get('/register', [AuthenticationController::class, 'getRegister'])->name('getRegister');
Route::get('/login', [AuthenticationController::class, 'getLogin'])->name('getLogin');
Route::post('/store-register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/store-login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
