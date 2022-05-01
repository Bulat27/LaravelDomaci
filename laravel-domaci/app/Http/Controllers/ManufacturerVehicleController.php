<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Resources\VehicleCollection;

class ManufacturerVehicleController extends Controller
{
    public function index($manufacturer_id){
        $vehicles = Vehicle::get()->where('manufacturer_id', $manufacturer_id);

        if(is_null($vehicles)){
            return response()->json('Data not found', 404);
        }

        // return response()->json($vehicles);
        return new VehicleCollection($vehicles);
    }
}
