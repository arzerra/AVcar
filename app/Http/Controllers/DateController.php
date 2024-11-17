<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateController extends Controller
{
    // Show the form
    public function showForm()
    {
        $today = now()->toDateString(); // Get today's date
        return view('dateform', compact('today')); // Pass today's date to the view
    }

    // Handle the form submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'selected_date' => 'required|date|after_or_equal:today', // Validate the selected date
        ]);

        // Process or save the date as needed
        // Example: Save to session or database
        // Session::put('return_date', $validatedData['selected_date']);

        return redirect()->back()->with('success', 'Date saved successfully!');
    }
}
