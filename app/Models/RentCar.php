<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_rent',
        'done_rent',
        'license_plate_number',
        'status',
        'user_name'
    ];
}
