<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/students', [StudentController::class, 'index'])->name('students');
// Route::get('/buses', [BusController::class, 'index'])->name('buses');

Route::get('/student/{id}/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.student');
Route::post('/student/{id}/book/{bus}', [BookingController::class, 'store'])->name('bus.book');
Route::delete('/student/{id}/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.cancel');    
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/admin', [AdminController::class, 'index'])->name('dashboard.admin');
// Route::middleware(['auth', 'admin'])->group(function () {

//     Route::get('/admin/routes/create', [Route::class, 'create'])
//         ->name('routes.create');

//     Route::post('/admin/routes/store', [Route::class, 'store'])
//         ->name('routes.store');

// });

Route::get('/admin/routes/create', [RouteController::class, 'create'])
        ->name('routes.create');

Route::post('/admin/routes/store', [RouteController::class, 'store'])
    ->name('routes.store');

Route::post('/admin/buses/store', [BusController::class, 'store'])
    ->name('buses.store');

Route::post('/admin/users/store', [UserController::class, 'store'])
    ->name('users.store');
    // ->middleware(['auth', 'admin']);

Route::post('/admin/users/{id}/ban', [UserController::class, 'ban'])->name('users.ban');
Route::post('/admin/users/{id}/unban', [UserController::class, 'unban'])->name('users.unban');
