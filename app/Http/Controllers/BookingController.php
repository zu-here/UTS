<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, $id, Bus $bus)
    {
        // find student
        $user = User::find($id);

        // duplicate check
        $alreadyBooked = Booking::where('user_id', $id)
            ->where('bus_id', $bus->id)
            ->exists();

        if ($alreadyBooked) {
            return back()->with('error', 'You already booked this bus.');
        }

        // total booked count
        $totalBooked = Booking::where('bus_id', $bus->id)->count();

        // bus full check
        if ($bus->available_capacity <= 0) {
            return back()->with('error', 'Bus is full.');
        }

        // did student choose to use points?
        $usePoints = $request->has('use_points');
        $usedPoints = false;

        // default
        $hasSubsidy = false;

        // sitting passengers
        if ($totalBooked < $bus->sitting_capacity) {

            $seatSerial = $totalBooked + 1;

            // reward subsidy
            if ($usePoints && $user->points >= 20) {

                $hasSubsidy = true;

                // points successfully used
                $usedPoints = true;

                // deduct points
                $user->points -= 20;
                $user->save();
            }

        } else {

            // standing passengers
            $seatSerial = -($totalBooked - $bus->sitting_capacity + 1);

            // automatic subsidy
            $hasSubsidy = true;
        }

        // create booking
        Booking::create([
            'user_id' => $id,
            'bus_id' => $bus->id,
            'seat_serial' => $seatSerial,
            'has_subsidy' => $hasSubsidy,
            'used_points' => $usedPoints,
            'payment_method' => null,
            'payment_status' => 'unpaid',
            'status' => 'booked',
        ]);

        // reduce available capacity
        $bus->available_capacity -= 1;
        $bus->save();

        // reward every 5 rides
        $user->total_rides += 1;

        if ($user->total_rides % 5 == 0) {
            $user->points += 20;
        }

        $user->save();

        return back()->with('success', 'Bus booked successfully.');
    }

    public function destroy($id, Booking $booking)
    {
        // security check
        if ($booking->user_id != $id) {
            return back()->with('error', 'Unauthorized action.');
        }

        // find bus
        $bus = Bus::find($booking->bus_id);

        // increase capacity
        if ($bus) {
            $bus->available_capacity += 1;
            $bus->save();
        }

        // find user
        $user = User::find($id);

        // decrease rides
        $user->total_rides -= 1;

        // remove reward points
        if ($user->total_rides % 5 == 4 && $user->points >= 20) {
            $user->points -= 20;
        }

        $user->save();

        // delete booking
        $booking->delete();

        return back()->with('success', 'Booking cancelled successfully.');
    }
}