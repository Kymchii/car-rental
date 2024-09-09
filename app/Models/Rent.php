<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = 'rent';

    protected $fillable = [
        'rent_id', 'vehicle_number', 'completion_date', 'city', 'tenant_id', 'number_of_passengers', 'receipt_id', 
    ];

    protected $primaryKey = 'rent_id';
}
