<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\StudentAdminController;
use App\Http\Controllers\admin\DepartmentAdminController;
use App\Http\Controllers\admin\GradeAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/grades', [GradeController::class, 'index'])->name('grades');
Route::get('/department', [DepartmentController::class, 'index'])->name('department');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin.admin-home');
    Route::get('/student', [StudentAdminController::class, 'students'])->name('admin.admin-student');
    Route::get('/department', [DepartmentAdminController::class, 'departments'])->name('admin.admin-department');
    Route::get('/grades', [GradeAdminController::class, 'grades'])->name('admin.admin-grade');
});

// Student Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/students', [StudentAdminController::class, 'students'])->name('admin.students');
    Route::post('/students', [StudentAdminController::class, 'store'])->name('admin.students.store');
    Route::put('/students/{student}', [StudentAdminController::class, 'update'])->name('admin.students.update');
    Route::delete('/students/{student}', [StudentAdminController::class, 'destroy'])->name('admin.students.destroy');
});
