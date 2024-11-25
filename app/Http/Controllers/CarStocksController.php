<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carstock; 

class CarStocksController extends Controller
{
    public function index()
    {
 
        $carStocks = Carstock::select('carName', 'carCount')->get();

        return response()->json($carStocks);
    }
}
