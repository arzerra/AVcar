<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalDate extends Model
{
    use HasFactory;

    protected $fillable = ['rent_date', 'return_date']; // Allow these fields to be mass-assigned
}
