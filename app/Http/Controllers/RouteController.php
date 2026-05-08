<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    //
    public function create()
    {
        return view('admin.routes.create');
    }

    // Store route
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:20|unique:routes,id',
            'name' => 'required|string|max:255',
            'path' => 'required|string',
        ]);

        Route::create([
            'id' => $request->id,
            'name' => $request->name,
            'path' => $request->path,
        ]);

        return redirect()->back()->with('success', 'Route added successfully!');
    }
}
