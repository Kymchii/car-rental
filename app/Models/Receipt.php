<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipt';

    protected $fillable = [
        'receipt_id', 'date' 
    ];

    protected $primaryKey = 'receipt_id';
}
