<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $routes = Route::all();
        $buses = Bus::with(['route', 'driver'])->get(); // 🔥 better
        $users = User::all();

        $drivers = User::where('role', 'driver')
            ->whereDoesntHave('bus')
            ->get();

        return view('dashboard.admin', compact('routes', 'buses', 'users', 'drivers'));
    }
}
