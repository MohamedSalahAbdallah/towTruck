<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'driver_id',
        'driver_name',
        'destination',
        'location',
        'pickup_time',
        'dropoff_time',
        'date',
        'rating',
        'price'
    ];


}
