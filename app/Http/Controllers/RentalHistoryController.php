<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentalHistoryController extends Controller
{
    public function index()
    {
        // Get the logged-in user's ID
        $userId = auth()->id(); 

        // Fetch the rental history of the logged-in user only
        $rentals = Rent::where('userID', $userId)->get();

        // Pass the rental history to the view
        return view('user.renthistory', compact('rentals'));
    }

    // Delete rental record
    public function deleteRental($id)
    {
        // Find the rental record
        $rent = Rent::findOrFail($id);

        // Prevent deletion if the rental status is 'rented'
        if ($rent->rentStatus === 'rented') {
            return redirect()->route('user.renthistory')->with('error', 'Cannot delete a rented car.');
        }

        // Delete the rental record
        $rent->delete();

        // Redirect to rental history page with success message
        return redirect()->route('user.renthistory')->with('success', 'Rental deleted successfully.');
    }
}
