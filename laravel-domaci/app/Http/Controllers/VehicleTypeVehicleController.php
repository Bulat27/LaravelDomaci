<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Resources\VehicleCollection;

class VehicleTypeVehicleController extends Controller
{
    public function index($vehicle_type_id){
        $vehicles = Vehicle::get()->where('vehicle_type_id', $vehicle_type_id);

        if(is_null($vehicles)){
            return response()->json('Data not found', 404);
        }

        // return response()->json($vehicles);
        return new VehicleCollection($vehicles);
    }
}
