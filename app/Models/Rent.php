<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $primaryKey = 'rentID'; // Primary key column
    protected $fillable = [
        'userID', 'carID', 'carName', 'carLicense', 'carPrice', 'duration', 'pickup', 'dropoff', 
        'total', 'rentStatus', 'dateRequested', 'rentDate', 'returnDate'
    ];

    /**
     * Get the car associated with the rent.
     */
    public function car()
    {
        return $this->belongsTo(Car::class, 'carID', 'carID');
    }

    /**
     * Get the user who made the rent.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
