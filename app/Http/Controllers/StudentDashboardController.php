<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    //
    public function index($id)
    {
        $student = Student::findOrFail($id);
        $buses = Bus::all();

        return view('dashboard.student', compact('student', 'buses'));
    }
}
