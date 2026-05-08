<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buses = Bus::all();
        $drivers = User::where('role', 'driver')->get();

        return view('buses.index', compact('buses', 'drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id' => 'required|string|max:20|unique:buses,id',
            'capacity' => 'required|integer|min:1',
            'route_id' => 'required|exists:routes,id',
            'ds_id' => 'nullable|exists:users,id',
        ]);

        Bus::create([
            'id' => $request->id,
            'capacity' => $request->capacity,
            'sitting_capacity' => $request->sitting_capacity,
            'available_capacity' => $request->capacity,
            'route_id' => $request->route_id,
            'ds_id' => $request->ds_id,
        ]);

        return back()->with('success', 'Bus added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
