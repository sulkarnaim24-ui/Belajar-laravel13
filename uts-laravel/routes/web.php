<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// =========================================================================
// RUTE UNTUK MODEL 1 (CATEGORY)
// =========================================================================

// Rute Menampilkan Halaman Utama Tabel Kategori
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Rute Menampilkan Form Tambah & Memproses Simpan Kategori (Commit 3)
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// 👇 DISINI KITA MENAMBAHKAN RUTE EDIT DAN UPDATE KATEGORI (Commit 4) 👇
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');


// =========================================================================
// RUTE UNTUK MODEL 2 (PRODUCT)
// =========================================================================
Route::get('/products', [ProductController::class, 'index'])->name('products.index');