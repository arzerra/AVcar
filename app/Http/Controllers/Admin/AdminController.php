<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
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

// Approve a rental request
public function approveRent($id)
{
    $rent = Rent::findOrFail($id);

    // Update rent status to 'rented'
    $rent->rentStatus = 'rented';  // Make sure it's quoted as a string
    $rent->rentDate = now();
    $rent->returnDate = now()->addDays($rent->duration);
    $rent->save();

    return redirect()->back()->with('success', 'Rent request approved.');
}

// Decline a rental request
public function declineRent($id)
{
    $rent = Rent::findOrFail($id);

    // Update rent status to 'declined'
    $rent->rentStatus = 'declined';  // Make sure it's quoted as a string
    $rent->save();

    return redirect()->back()->with('success', 'Rent request declined.');
}

}
