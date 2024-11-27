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

    // Fetch the next available car by carName
    $car = Car::where('carName', $validated['carName'])
        ->where('carStatus', 'available') // Only fetch cars that are available
        ->first();

    if (!$car) {
        return redirect()->back()->with('error', 'No available cars with the selected name.');
    }

    // Calculate the total cost
    $total = $validated['rentDays'] * $car->carPrice;

    // Store the rent details with additional car details (carPrice, carLicense)
    $rent = Rent::create([
        'userID' => Auth::id(), // Current logged-in user
        'carID' => $car->carID, // Assign the carID of the available car
        'carName' => $car->carName,
        'carLicense' => $car->carLicense, // Save carLicense
        'carPrice' => $car->carPrice, // Save carPrice
        'duration' => $validated['rentDays'],
        'pickup' => $validated['pickup_location'],
        'dropoff' => $validated['dropoff_location'],
        'total' => $total,
        'rentStatus' => 'pending', // Mark rent as pending until admin approval
        'dateRequested' => now(),
    ]);

    // Do not update car status to 'rented' here. Wait for admin approval.

    return redirect()->route('dashboard')->with('success', 'Rental request submitted successfully.');
}



}
