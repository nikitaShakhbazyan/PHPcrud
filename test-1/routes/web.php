<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',[ProductsController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products',[ProductsController::class,'store'])->name('products.store');
Route::get('/products/{product}/edit',[ProductsController::class,'edit'])->name('products.edit');
Route::put('/products/{product}/update',[ProductsController::class,'update'])->name('products.update');