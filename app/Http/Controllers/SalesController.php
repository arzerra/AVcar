<?php

namespace App\Http\Controllers;
use App\Models\Rent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function index(Request $request)
{
    // Get the month and year filters from the request
    $month = $request->get('month');
    $year = $request->get('year');
    $specificDate = $request->get('date');

    // Initialize the query for rents
    $rentsQuery = Rent::with('user', 'car');

    // Filter by month and year if provided
    if ($month && $year) {
        $rentsQuery->whereMonth('rentDate', $month)
                   ->whereYear('rentDate', $year);
    }

    // Filter by specific date if provided
    if ($specificDate) {
        $rentsQuery->whereDate('rentDate', Carbon::parse($specificDate)->format('Y-m-d'));
    }

    // Get the filtered rents and total sales
    $rents = $rentsQuery->get();
    $totalSales = $rentsQuery->sum('total');

    return view('admin.sales', compact('rents', 'totalSales'));
}
}
