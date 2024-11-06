<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DepartmentController;
Route::get('/', function () {
    return view('welcome');
});





Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
ROute::get('/student', [StudentController::class, 'index']);
ROute::get('/grades', [GradeController::class, 'index']);
Route::get('/department', [DepartmentController::class, 'index']);
