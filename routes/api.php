<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdminApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product', [ApiController::class, 'getProduct']);
Route::post('/store-product', [ApiController::class, 'storeProduct'])->middleware('auth:sanctum', IsAdminApi::class);
Route::post('/update-product/{id}', [ApiController::class, 'updateProduct'])->middleware('auth:sanctum', IsAdminApi::class);
Route::post('/delete-product/{id}', [ApiController::class, 'deleteProduct'])->middleware('auth:sanctum', IsAdminApi::class);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
