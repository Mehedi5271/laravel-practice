<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::patch('/product/{id}',[ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/trash',[ProductController::class,'trash'])->name('product.trash');
    Route::patch('/trash/{id}',[ProductController::class,'restore'])->name('product.restore');
    Route::delete('/trash/{id}',[ProductController::class,'delete'])->name('product.delete');


    Route::get('/donors',[DonorController::class,'index'])->name('donor.index');
    Route::get('/donors/create',[DonorController::class,'create'])->name('donor.create');
    Route::post('/donors',[DonorController::class,'store'])->name('donor.store');
    Route::get('/donors/{id}/edit',[DonorController::class,'edit'])->name('donor.edit');
    Route::patch('/donors/{id}',[DonorController::class,'update'])->name('donor.update');
    Route::delete('/donors/{id}',[DonorController::class,'destroy'])->name('donor.destroy');
    Route::get('/donors/trash',[DonorController::class,'trash'])->name('donor.trash');
    Route::patch('/donors/{id}/trash',[DonorController::class,'restore'])->name('donor.restore');
    Route::delete('/donors/{id}/delete',[DonorController::class,'delete'])->name('donor.delete');


    Route::get('/user',[UserController::class,'index'])->name('index.user');
});

require __DIR__.'/auth.php';
