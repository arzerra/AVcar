<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarStock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Apply search filter if query exists
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('carType', 'LIKE', "%$search%")
                  ->orWhere('carName', 'LIKE', "%$search%")
                  ->orWhere('carLicense', 'LIKE', "%$search%")
                  ->orWhere('carStatus', 'LIKE', "%$search%");
        }

        // Apply availability filter if checkbox is checked
        if ($request->has('filter.available') && $request->filter['available']) {
            $query->where('carStatus', 'available');  // Adjust based on how you store the availability status
        }

        $cars = $query->get();
        $carStocks = CarStock::all(); // Adjust as needed

        return view('admin.inventory', compact('cars', 'carStocks'));
    }

public function destroy(Car $car)
{
    // Check if the car is rented
    if ($car->carStatus === 'rented') {
        return redirect()->route('admin.inventory')->with('error', 'Car cannot be deleted because it is currently rented.');
    }

    // Proceed with deletion if the car is not rented
    $car->delete();

    return redirect()->route('admin.inventory')->with('success', 'Car deleted successfully');
}

public function returnCar(Request $request, Car $car)
{
    // Check if the car is currently rented
    if ($car->carStatus !== 'rented') {
        return redirect()->route('admin.inventory')->with('error', 'Only rented cars can be returned.');
    }

    // Update the car's status to "available"
    $car->update([
        'carStatus' => 'available',
    ]);

    return redirect()->route('admin.inventory')->with('success', 'Car returned successfully and is now available.');
}




}
