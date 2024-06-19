<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product', [ApiController::class, 'getProduct']);
Route::post('/store-product', [ApiController::class, 'storeProduct']);
Route::post('/update-product/{id}', [ApiController::class, 'updateProduct']);
Route::post('/delete-product/{id}', [ApiController::class, 'deleteProduct']);
