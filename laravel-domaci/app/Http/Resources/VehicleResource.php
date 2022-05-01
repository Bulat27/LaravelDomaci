<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'vehicle';

    public function toArray($request)
    {
        return [
            'color' => $this->resource->color,
            'fuel_type' => $this->resource->fuel_type,
            'manufacture_year' => $this->resource->manufacture_year,
            'engine_capacity' => $this->resource->engine_capacity,
            'mileage' => $this->resource->mileage,
            'vehicle_type' => new VehicleTypeResource($this->resource->vehicle_type),
            'manufacturer' => new ManufacturerResource($this->resource->manufacturer)
        ];
    }
}
