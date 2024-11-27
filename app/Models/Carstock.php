<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carstock extends Model
{
    use HasFactory;

    protected $primaryKey = 'stockID';

    protected $fillable = ['carName', 'carCount'];

    /**
     * Fetch carstocks where the car's status is available.
     */
    public static function availableStocks()
    {
        return DB::table('carstocks')
            ->join('cars', 'carstocks.carName', '=', 'cars.carName')
            ->where('cars.carStatus', 'available')
            ->select('carstocks.*') // Select only carstocks columns
            ->get();
    }
}
