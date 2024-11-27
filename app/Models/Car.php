<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'carID'; // Set primary key to 'carID'
    public $incrementing = true; // Primary key is auto-incrementing
    protected $keyType = 'int'; // Primary key type is integer

    protected $fillable = [
        'carName', 
        'carType', 
        'carLicense', 
        'carPrice', 
        'carStatus', 
        'rentID',
    ];

    protected static function boot()
    {
        parent::boot();

        // Increment stock when a car is added
        static::created(function ($car) {
            DB::table('carstocks')->updateOrInsert(
                ['carName' => $car->carName],
                ['carCount' => DB::raw('carCount + 1')]
            );
        });

        // Decrement stock when a car is removed
        static::deleted(function ($car) {
            DB::table('carstocks')->where('carName', $car->carName)->decrement('carCount');
        });

        // Listen for updates to carStatus
        static::updated(function ($car) {
            if ($car->isDirty('carStatus')) {
                // When the status changes to 'rented', decrement carCount
                if ($car->carStatus === 'rented') {
                    DB::table('carstocks')->where('carName', $car->carName)->decrement('carCount');
                }

                // When the status changes to 'available', increment carCount
                if ($car->carStatus === 'available') {
                    DB::table('carstocks')->where('carName', $car->carName)->increment('carCount');
                }
            }
        });
    }

    public function rents()
    {
        return $this->hasMany(Rent::class, 'carID', 'carID');
    }
}
