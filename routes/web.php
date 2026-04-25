<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/students', [StudentController::class, 'index'])->name('students');
// Route::get('/buses', [BusController::class, 'index'])->name('buses');
Route::get('/student/{id}/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.student');
