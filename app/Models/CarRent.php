<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRent extends Model
{
    use HasFactory;

    protected $table = 'carRent';

    protected $fillable = [
        'userID',
        'carID',
        'carName',
        'duration',
        'pickup',
        'dropoff',
        'total',
        'rentStatus',
        'dateRequest',
        'rentDate',
        'returnDate',
    ];
}
