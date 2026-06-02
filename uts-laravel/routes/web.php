<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// TAMBAHKAN BARIS INI UNTUK MENGHUBUNGKAN KE CONTROLLER CATEGORY
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');