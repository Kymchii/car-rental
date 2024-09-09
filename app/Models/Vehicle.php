<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    protected $fillable = [
        'vehicle_number', 'machine_number', 'car_type', 'car_name', 'brand', 'capacity', 'rates', 
    ];

    protected $primaryKey = 'vehicle_number';
    protected $keyType = 'string';
}
