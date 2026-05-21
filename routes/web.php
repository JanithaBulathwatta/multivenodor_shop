<?php

use App\Http\Controllers\MainHomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//add and manage products
Route::get('/get-add-products',[ProductController::class, 'loadAddProducts'])->name('product.add');
Route::post('/set-product-creat',[ProductController::class, 'setProductCreate']);
Route::get('/get-product-details',[ProductController::class,'getProductDetails']);
Route::post('/set-product-delete',[ProductController::class,'setProductDelete']);
Route::post('/set-product-update',[ProductController::class,'setProductUpdate']);

//home and show products
Route::get('/get-show-products',[MainHomeController::class,'loadShowProducts'])->name('home.show');
require __DIR__.'/auth.php';
