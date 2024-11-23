<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carstock; // Your existing Carstock model

class CarStocksController extends Controller
{
    public function index()
    {
        // Fetch all car stocks from the database
        $carStocks = Carstock::select('carName', 'carCount')->get();

        // Return the data as JSON
        return response()->json($carStocks);
    }
}
