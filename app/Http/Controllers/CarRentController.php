<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarRent; // Import your model
use Carbon\Carbon;

class CarRentController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'carID' => 'required|exists:cars,carID',
        'carName' => 'required|string|exists:cars,carName',
        'dateRequest' => 'required|date',
        'returnDate' => 'required|date|after_or_equal:dateRequest',
        'pickup' => 'required|date',
        'dropoff' => 'required|date|after_or_equal:pickup',
    ]);

    // Calculate duration
    $dateRequest = Carbon::parse($validated['dateRequest']);
    $returnDate = Carbon::parse($validated['returnDate']);
    $duration = $dateRequest->diffInDays($returnDate);

    // Create new carRent entry
    CarRent::create([
        'userID' => auth()->id(),
        'carID' => $validated['carID'],
        'carName' => $validated['carName'],
        'duration' => $duration,
        'pickup' => $validated['pickup'],
        'dropoff' => $validated['dropoff'],
        'total' => $duration * 750, // Example rental rate
        'dateRequest' => $validated['dateRequest'],
        'returnDate' => $validated['returnDate'],
        'rentStatus' => 'pending',
    ]);

    return redirect()->back()->with('success', 'Car rental request submitted!');
}

}
