<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DeliveryAvailabilityController;
use App\Http\Controllers\DeliveryCoordinateController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware(('auth:sanctum'))->group(function () {

    // ? RUTAS FOR CLIENT //

    Route::get('/establisments', [EstablishmentController::class, 'index']);
    Route::get('/establisments/{establishment}', [EstablishmentController::class, 'show']);

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products:show');

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add-product/{product}', [CartController::class, 'store']);
    Route::put('/cart/{rowId}', [CartController::class, 'update']);
    Route::delete('/cart/{rowId}', [CartController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);

    // ? RUOTES FOR DELIVERY //
    Route::put('/availability', [DeliveryAvailabilityController::class, 'update']);
    Route::put('/coordinates', [DeliveryCoordinateController::class, 'update']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
