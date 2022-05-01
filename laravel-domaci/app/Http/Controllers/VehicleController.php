<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Resources\VehicleResource;
use App\Http\Resources\VehicleCollection;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return new VehicleCollection($vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'color'=>'required|String|max:255',
            'fuel_type'=>'required|String|max:255',
            'manufacture_year'=>'required|Integer|max:2022',
            'engine_capacity'=>'required|between:1,5',
            'mileage'=>'required|Integer|max:500000',
            'manufacturer_id'=>'required',
            'vehicle_type_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $vehicle = new Vehicle;
        $vehicle->color = $request->color;
        $vehicle->fuel_type = $request->fuel_type;
        $vehicle->manufacture_year = $request->manufacture_year;
        $vehicle->engine_capacity = $request->engine_capacity;
        $vehicle->mileage = $request->mileage;
        $vehicle->manufacturer_id= $request->manufacturer_id;
        $vehicle->vehicle_type_id= $request->vehicle_type_id;

        if($vehicle->save()){
            return response()->json(['Vehicle has been saved successfully!', new VehicleResource($vehicle)]);
        }

        return response()->json('Vehicle has not been saved successfully!', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // $validator=Validator::make($request->all(),[
        //     'color'=>'required|String|max:255',
        //     'fuel_type'=>'required|String|max:255',
        //     'manufacture_year'=>'required|Integer|max:2022',
        //     'engine_capacity'=>'required|between:1,5',
        //     'mileage'=>'required|Integer|max:500000',
        //     'manufacturer_id'=>'required',
        //     'vehicle_type_id'=>'required'
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());
        // }

        // $vehicle->color = $request->color;
        // $vehicle->fuel_type = $request->fuel_type;
        // $vehicle->manufacture_year = $request->manufacture_year;
        // $vehicle->engine_capacity = $request->engine_capacity;
        // $vehicle->mileage = $request->mileage;
        // $vehicle->manufacturer_id= $request->manufacturer_id;
        // $vehicle->vehicle_type_id= $request->vehicle_type_id;

        // if($vehicle->update()){
        //     return response()->json(['Vehicle has been updated successfully!', new VehicleResource($vehicle)]);
        // }

        // return response()->json('Vehicle has not been updated successfully!', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        if($vehicle->delete()){
            return response()->json('Vehicle has been successfully deleted!');
        }

        return response()->json('Vehicle deletion has failed!', 500);
    }
}
