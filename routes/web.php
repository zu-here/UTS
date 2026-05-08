<?php

use App\Http\Controllers\AdminController;
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

// Route::get('/students', [StudentController::class, 'index'])->name('students');
// Route::get('/buses', [BusController::class, 'index'])->name('buses');
Route::get('/student/{id}/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.student');
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
