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
    // Get the filters from the request
    $month = $request->get('month');
    $year = $request->get('year');
    $specificDate = $request->get('date');
    $customerName = $request->get('customer_name'); // New filter

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

    // Filter by customer name if provided
    if ($customerName) {
        $rentsQuery->whereHas('user', function ($query) use ($customerName) {
            $query->where('name', 'like', '%' . $customerName . '%');
        });
    }

    // Get the filtered rents and total sales
    $rents = $rentsQuery->get();
    $totalSales = $rents->sum('total');

    return view('admin.sales', compact('rents', 'totalSales'));
}


public function downloadSales(Request $request)
{
    // Get the filters from the request
    $month = $request->get('month');
    $year = $request->get('year');
    $specificDate = $request->get('date');
    $customerName = $request->get('customer_name'); // Add customer name filter

    // Initialize the query for rents
    $rentsQuery = Rent::with('user', 'car');

    // Apply the filters
    if ($month && $year) {
        $rentsQuery->whereMonth('rentDate', $month)
                   ->whereYear('rentDate', $year);
    }

    if ($specificDate) {
        $rentsQuery->whereDate('rentDate', Carbon::parse($specificDate)->format('Y-m-d'));
    }

    if ($customerName) {
        $rentsQuery->whereHas('user', function ($query) use ($customerName) {
            $query->where('name', 'like', '%' . $customerName . '%');
        });
    }

    // Execute the query and get filtered rents
    $rents = $rentsQuery->get();

    // Ensure correct data is being fetched
    if ($rents->isEmpty()) {
        abort(404, 'No records found for the given filters.');
    }

    // Calculate the total sales
    $totalSales = $rents->sum('total');

    // Prepare the description line
    $description = 'Showing all sales';
    if ($specificDate) {
        $description = 'Showing sales for ' . Carbon::parse($specificDate)->format('F d, Y');
    } elseif ($month && $year) {
        $startDate = Carbon::create($year, $month, 1)->format('F d, Y');
        $endDate = Carbon::create($year, $month, Carbon::daysInMonth($year, $month))->format('F d, Y');
        $description = 'Showing sales from ' . $startDate . ' to ' . $endDate;
    }

    if ($customerName) {
        $description = 'Showing all sales records for customer "' . $customerName . '"';
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
    $csvData[] = ['Total Sales', '', '', '', number_format($totalSales, 2)];

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
