<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('admin')->group(function () {
    Route::get('/products', [AdminController::class, 'index'])->name('admin.product.index');
    Route::get('/products/create', [AdminController::class, 'create'])->name('admin.product.create');
    Route::post('/products', [AdminController::class, 'store'])->name('admin.product.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'edit'])->name('admin.product.edit');
    Route::put('/products/{product}', [AdminController::class, 'update'])->name('admin.product.update');
    Route::get('/products/{product}/delete', [AdminController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('/products/{product}/delete_image', [AdminController::class, 'destroyImage'])->name('admin.product.destroyImage');
});