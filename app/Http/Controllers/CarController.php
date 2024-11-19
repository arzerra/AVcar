<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; // Import the Car model

class CarController extends Controller
{
public function store(Request $request)
{
    // Validate the form input
    $request->validate([
        'carName' => 'required|string', // Car name (e.g., Toyota Vios, Mitsubishi Mirage)
        'email' => 'required|string|unique:cars,carLicense', // License plate must be unique
        'carPrice' => 'required|string', // Rental price
    ]);

    // Create a new car record and store it in the database
    $car = new Car();
    $car->carName = $request->carName; // Store the selected car name directly
    $car->carLicense = $request->email;
    $car->carPrice = $this->convertToPrice($request->carPrice); // Convert price to numeric value
    $car->carStatus = 'available'; // Default status is 'available'
    $car->rentID = 0; // Default rentID (you'll update it later)
    
    // Set the carType based on the selected car name
    $car->carType = $this->getCarType($request->carName);

    $car->save();

    return redirect()->back()->with('success', 'Car added successfully!');
}

// Helper function to map carName to carType
private function getCarType($carName)
{
    $carTypes = [
        'Toyota Vios' => 'Economy',
        'Mitsubishi Mirage' => 'Economy',
        'Honda City' => 'Economy',
        'Suzuki Alto' => 'Economy',
    ];

    return $carTypes[$carName] ?? 'unknown';
}

// Convert car price from string to numeric value
private function convertToPrice($price)
{
    // Remove the '₱' symbol and convert it to a numeric value
    return floatval(str_replace('₱', '', $price));
}


}
