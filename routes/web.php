<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [ProductController::class, 'getHome']);
Route::get('/create-product', [ProductController::class, 'getCreateProduct']);
Route::post('/store-product', [ProductController::class, 'storeProduct']);
Route::get('/update-product/{id}', [ProductController::class, 'updateProduct']);
Route::post('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::post('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
