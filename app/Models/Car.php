<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'carName', 'carType', 'carLicense', 'carPrice', 'carStatus', 'rentID',
    ];

    /**
     * Boot method to handle stock updates.
     */
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
    }

    /**
     * Get the rents associated with the car.
     */
    public function rents()
    {
        return $this->hasMany(Rent::class, 'carID', 'carID');
    }

    
}
