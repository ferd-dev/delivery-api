<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware(('auth:sanctum'))->group(function () {

    Route::get('/establisments', [EstablishmentController::class, 'index']);
    Route::get('/establisments/{establishment}', [EstablishmentController::class, 'show']);

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products:show');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
