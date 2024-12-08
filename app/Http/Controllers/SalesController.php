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

public function downloadSales(Request $request)
{
    // Get the month, year, and specific date filters from the request
    $month = $request->get('month');
    $year = $request->get('year');
    $specificDate = $request->get('date');

    // Initialize the query for rents
    $rentsQuery = Rent::with('user', 'car');

    // Apply the filters (same as in the index method)
    if ($month && $year) {
        $rentsQuery->whereMonth('rentDate', $month)
                   ->whereYear('rentDate', $year);
    }

    if ($specificDate) {
        $rentsQuery->whereDate('rentDate', Carbon::parse($specificDate)->format('Y-m-d'));
    }

    // Get the filtered rents
    $rents = $rentsQuery->get();

    // Calculate the total sales
    $totalSales = $rentsQuery->sum('total');

    // Prepare the description line
    $description = '';

    if ($specificDate) {
        // Specific date filter
        $description = 'Showing sales for ' . Carbon::parse($specificDate)->format('F d, Y');
    } elseif ($month && $year) {
        // Month and year filter
        $startDate = Carbon::create($year, $month, 1)->format('F d, Y');
        $endDate = Carbon::create($year, $month, Carbon::daysInMonth($year, $month))->format('F d, Y');
        $description = 'Showing sales from ' . $startDate . ' to ' . $endDate;
    } else {
        // No filters applied, showing all sales
        $description = 'Showing all sales';
    }

    // Prepare CSV data
    $csvData = [
        ['Description', '', '', '', ''],
        [$description, '', '', '', ''],  // Add the description row
        ['Customer', 'Rent ID', 'Car Name', 'Rent Date', 'Total']
    ];

    // Populate the rows with the rental data
    foreach ($rents as $rent) {
        $csvData[] = [
            $rent->user->name,
            $rent->rentID,
            $rent->car->carName,
            Carbon::parse($rent->rentDate)->format('M d, Y'),
            number_format($rent->total, 2)
        ];
    }

    // Add total sales row at the end of the CSV
    $csvData[] = ['Total Sales', '', '', '', ''. number_format($totalSales, 2)];

    // Set the filename for the download
    $filename = 'AVCar_Sales_' . now()->format('Ymd') . '.csv';

    // Open output stream to create the CSV file
    $handle = fopen('php://output', 'w');

    // Set headers for the download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Write the CSV data to the output
    foreach ($csvData as $row) {
        fputcsv($handle, $row);
    }

    // Close the output stream
    fclose($handle);
    exit;
}




}
