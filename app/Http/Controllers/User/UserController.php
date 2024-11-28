<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Car; 
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // Get logged-in user's ID
        $rentals = Rent::where('userID', $userId)->get(); // Fetch rentals for the user

        return view('dashboard', compact('rentals'));
    }

    public function cancelRental($id)
{
    // Find the rental record
    $rent = Rent::findOrFail($id);

    // Check if the rental is rented and within the cancellation window
    if ($rent->rentStatus === 'rented' && \Carbon\Carbon::parse($rent->rentDate)->diffInHours(now()) <= 24) {
        // Update the car's status to 'available'
        $car = Car::findOrFail($rent->carID);
        $car->carStatus = 'available';
        $car->save();

        // Update the rental status to 'cancelled'
        $rent->rentStatus = 'cancelled';
        $rent->save();

        return redirect()->route('dashboard')->with('success', 'Rental canceled successfully, and the car is now available.');
    }

    return redirect()->route('dashboard')->with('error', 'You cannot cancel this rental.');
}


    public function deleteRental($id)
{
    $rent = Rent::findOrFail($id);
    $rent->delete();

    return redirect()->route('dashboard')->with('success', 'Rental deleted successfully.');
}

}
