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
}
