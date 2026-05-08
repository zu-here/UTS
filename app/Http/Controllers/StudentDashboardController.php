<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    //
    public function index($id)
    {
        $student = User::findOrFail($id);
        $buses = Bus::all();
        $routes = Route::all();
        $bookings = Booking::where('user_id', $id)->get();

        return view('dashboard.student', compact('student', 'buses', 'routes', 'bookings'));
    }
}
