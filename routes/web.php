<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Driver Routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('driver')->group(function () {
        Route::get('/dashboard', [DriverDashboardController::class, 'index'])->name('driver.dashboard');
        Route::post('/update-status', [DriverDashboardController::class, 'updateStatus'])->name('driver.updateStatus');
        Route::post('/store-fuel', [DriverDashboardController::class, 'storeFuelLog'])->name('driver.storeFuel');
        Route::post('/store-expense', [DriverDashboardController::class, 'storeExpenseRequest'])->name('driver.storeExpense');
        Route::post('/store-feedback', [DriverDashboardController::class, 'storeFeedback'])->name('driver.storeFeedback');
    });
});

// Route::get('/students', [StudentController::class, 'index'])->name('students');
// Route::get('/buses', [BusController::class, 'index'])->name('buses');
Route::get('/student/{id}/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.student');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
