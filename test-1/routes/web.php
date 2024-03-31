<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/products',[ProductsController::class,'index'])->name('products.index');
    Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
    Route::post('/products',[ProductsController::class,'store'])->name('products.store');
    Route::get('/products/{product}/edit',[ProductsController::class,'edit'])->name('products.edit');
    Route::put('/products/{product}/update',[ProductsController::class,'update'])->name('products.update');
    Route::delete('/products/{product}/delete',[ProductsController::class,'delete'])->name('products.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
