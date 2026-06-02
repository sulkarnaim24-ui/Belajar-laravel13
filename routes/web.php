<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/', [StudentController::class, 'index']);

Route::get('/student', [StudentController::class, 'index'])->name('Student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('Student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('Student.store');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('Student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('Student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('Student.destroy');

Route::resource('department', DepartmentController::class);
Route::resource('lecturer', LecturerController::class);


