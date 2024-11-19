<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carstock extends Model
{
    use HasFactory;

    protected $primaryKey = 'stockID';

    protected $fillable = ['carName', 'carCount'];
}
