<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedVehicle extends Model
{
    use HasFactory;

    protected $table = 'used_vehicle';

    protected $primaryKey = 'used_vehicle_id';

    protected $fillable = [
        'brand',
        'year_circulation',
        'mileage',
        'price',
        'description',
        'equipment',
        'image_vehicle',
        'vehicle_management',
    ];

    public $timestamps = false;
}
