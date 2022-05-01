<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeVehicleController;
use App\Http\Controllers\ManufacturerVehicleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('vehicle-types', VehicleTypeController::class);
Route::resource('manufacturers', ManufacturerController::class);
Route::resource('vehicles', VehicleController::class);

Route::resource('vehicle-types.vehicles', VehicleTypeVehicleController::class)->only(['index']);
Route::resource('manufacturers.vehicles', ManufacturerVehicleController::class)->only(['index']);
