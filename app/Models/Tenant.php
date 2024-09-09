<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenant';

    protected $fillable = [
        'tenant_id', 'address', 'phone', 'user_id'
    ];

    protected $primaryKey = 'tenant_id';
}
