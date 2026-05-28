<?php

use App\Http\Controllers\Api\OrderApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-delivery-details',[OrderApiController::class, 'getPendingOrderDetails']);
Route::put('/set-update-delivery-status/{id}', [OrderApiController::class, 'markAsDelivered']);
