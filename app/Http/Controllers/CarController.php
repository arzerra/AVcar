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
        'carLicense' => 'required|string|unique:cars,carLicense|size:6', // License plate must be unique
        'carPrice' => 'required|string', // Rental price
    ], [
        'carLicense.unique' => 'Car already added! The license plate you entered is already in use.', // Custom error message for duplicate license plate
        'carLicense.size' => 'The car license plate must be exactly 6 characters.', // Custom error message for license plate size
    ]);

    // Create a new car record and store it in the database
    $car = new Car();
    $car->carName = $request->carName; // Store the selected car name directly
    $car->carLicense = $request->carLicense; // Store the license plate
    $car->carPrice = $this->convertToPrice($request->carPrice); // Convert price to numeric value
    $car->carStatus = 'available'; // Default status is 'available'
    $car->rentID = 0; // Default rentID (you'll update it later)
    
    // Set the carType based on the selected car name
    $car->carType = $this->getCarType($request->carName);

    // Save the new car record in the database
    $car->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Car added successfully!');
}


// Helper function to map carName to carType
private function getCarType($carName)
{
        $carTypes = [
            // Economy
            'Toyota Vios' => 'Economy',
            'Mitsubishi Mirage' => 'Economy',
            'Honda City' => 'Economy',
            'Suzuki Alto' => 'Economy',

            // Compact
            'Suzuki Swift' => 'Compact',
            'Hyundai Accent' => 'Compact',
            'Kia Rio' => 'Compact',
            'Nissan Almera' => 'Compact',

            // Fullsize
            'Toyota Camry' => 'Fullsize',
            'Honda Accord' => 'Fullsize',
            'Hyundai Sonata' => 'Fullsize',
            'Kia Optima' => 'Fullsize',

            // Luxury
            'BMW 3-Series' => 'Luxury',
            'Mercedes-Benz C-Class' => 'Luxury',
            'Audi A4' => 'Luxury',
            'Jaguar XJ' => 'Luxury',

            // SUVs
            'Toyota Fortuner' => 'SUVs',
            'Mitsubishi Montero Sport' => 'SUVs',
            'Ford Everest' => 'SUVs',
            'Nissan Terra' => 'SUVs',

            // Vans
            'Mitsubishi L300' => 'Vans',
            'Toyota Hiace Commuter' => 'Vans',
            'Hyundai Starex 2007' => 'Vans',
            'Kia Grand Carnival' => 'Vans',

            // Sports
            'Mazda MX-5 Miata' => 'Sports',
            'Ford Mustang GT' => 'Sports',
            'Toyota 86' => 'Sports',
            'Subaru BRZ' => 'Sports',

            // Trucks
            'Isuzu N-Series NHR' => 'Trucks',
            'Mitsubishi Fuso Canter' => 'Trucks',
            'Hyundai H-100' => 'Trucks',
            'Foton Tornado' => 'Trucks',

            // E-Cars
            'Luxeed S7' => 'E-Cars',
            'JiYue ROBO-02' => 'E-Cars',
            'BMW i4' => 'E-Cars',
            'BYD Seal U' => 'E-Cars'
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
