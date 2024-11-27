<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin dashboard and view pending rental requests
    public function index()
    {
        // Fetch pending rentals with rentStatus = 'pending'
        $pendingRents = Rent::where('rentStatus', 'pending')->get();

        // Return to view with the pending rents
        return view('admin.dashboard', compact('pendingRents'));
    }

   public function approveRent($id)
{
    // Find the rent record
    $rent = Rent::findOrFail($id);

    // Find the next available car (this will assign a new car even if carName is the same)
    $availableCar = Car::where('carStatus', 'available')
                        ->where('carName', $rent->carName)  // Ensuring it's the same car name
                        ->first(); // Get the first available car with the same car name

    if (!$availableCar) {
        // Redirect back with error if no car is available
        return redirect()->back()->with('error', 'No available cars to assign.');
    }

    // Assign the car to the rent
    $rent->carID = $availableCar->carID;  // Assign new car's ID
    $rent->carName = $availableCar->carName;  // Assign the car name
    $rent->carLicense = $availableCar->carLicense;  // Assign the car license
    $rent->carPrice = $availableCar->carPrice;  // Assign the car price
    $rent->rentStatus = 'rented';  // Set status to 'rented'
    $rent->rentDate = now();
    $rent->returnDate = now()->addDays($rent->duration);
    $rent->save();

    // Update the car's status to rented
    $availableCar->carStatus = 'rented';
    $availableCar->rentID = $rent->rentID;  // Link the car to this rent
    $availableCar->save();

    return redirect()->back()->with('success', 'Rent request approved, and car assigned.');
}

    // Decline a rental request
    public function declineRent($id)
    {
        $rent = Rent::findOrFail($id);

        // Update rent status to 'declined'
        $rent->rentStatus = 'declined';  // Set status to 'declined'
        $rent->save();

        return redirect()->back()->with('success', 'Rent request declined.');
    }
}
