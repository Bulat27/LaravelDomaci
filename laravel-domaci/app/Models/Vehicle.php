<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = 
    ['color',
     'fuel_type',
     'manufacture_year',
     'engine_capacity',
     'mileage',
     'manufacturer_id',
     'vehicle_type_id'
];

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function vehicle_type(){
        return $this->belongsTo(VehicleType::class);
    }
}
