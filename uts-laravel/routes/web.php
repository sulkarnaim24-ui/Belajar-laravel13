<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// TAMBAHKAN BARIS INI UNTUK MENGHUBUNGKAN KE CONTROLLER CATEGORY
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Rute untuk menampilkan form dan memproses tambah data kategori
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// TAMBAHKAN BARIS INI UNTUK RUTE PRODUK
Route::get('/products', [ProductController::class, 'index'])->name('products.index');