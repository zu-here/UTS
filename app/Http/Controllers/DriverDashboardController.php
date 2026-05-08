<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\FuelLog;
use App\Models\ExpenseRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverDashboardController extends Controller
{
    public function index()
    {
        // For simplicity, we assume driver is assigned to the first bus in their table
        // Since they use string IDs like 'B-01', we use firstOrCreate with a sample string if empty
        $bus = Bus::firstOrCreate(['id' => 'B-01'], [
            'capacity' => 40,
            'route_name' => 'Main Route',
            'ds_id' => 'DS-01'
        ]);

        $fuelLogs = FuelLog::where('bus_id', $bus->id)->latest()->take(5)->get();
        $expenses = ExpenseRequest::where('bus_id', $bus->id)->latest()->take(5)->get();
        
        return view('driver.dashboard', compact('bus', 'fuelLogs', 'expenses'));
    }

    public function updateStatus(Request $request)
    {
        $bus = Bus::first(); // Still assuming first bus for simplicity
        $bus->update([
            'seat_status' => $request->seat_status,
            'payment_method' => $request->payment_method
        ]);

        return back()->with('success', 'Bus status updated successfully!');
    }

    public function storeFuelLog(Request $request)
    {
        $request->validate([
            'amount_liters' => 'required|numeric',
            'cost' => 'required|numeric',
            'refuel_date' => 'required|date',
        ]);

        $bus = Bus::first();

        FuelLog::create([
            'bus_id' => $bus->id,
            'amount_liters' => $request->amount_liters,
            'cost' => $request->cost,
            'refuel_date' => $request->refuel_date,
        ]);

        return back()->with('success', 'Fuel cost enrolled successfully!');
    }

    public function storeExpenseRequest(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string',
            'description' => 'required|string',
        ]);

        $bus = Bus::first();

        ExpenseRequest::create([
            'bus_id' => $bus->id,
            'item_name' => $request->item_name,
            'description' => $request->description,
            'estimated_cost' => $request->estimated_cost,
        ]);

        return back()->with('success', 'Expense request sent to Admin!');
    }

    public function storeFeedback(Request $request)
    {
        Feedback::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'message' => $request->message
        ]);
        return back()->with('success', 'Feedback submitted!');
    }
}
