<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function processRent(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'carName' => 'required|string',
            'rentDays' => 'required|integer|min:1',
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string',
        ]);

        // Fetch the car details using carName
        $car = Car::where('carName', $validated['carName'])->first();
        if (!$car) {
            return redirect()->back()->with('error', 'Invalid car selection.');
        }

        // Calculate the total cost
        $total = $validated['rentDays'] * $car->carPrice;

        // Store the rent details
        $rent = Rent::create([
            'userID' => Auth::id(), // Current logged-in user
            'carID' => $car->carID,
            'carName' => $car->carName,
            'duration' => $validated['rentDays'],
            'pickup' => $validated['pickup_location'],
            'dropoff' => $validated['dropoff_location'],
            'total' => $total,
            'rentStatus' => 'pending', // Change rentStatus to 'pending' instead of 0
            'dateRequested' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Rental request submitted successfully.');
    }
}
