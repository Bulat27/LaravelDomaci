<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Manufacturer;
use App\Models\VehicleType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));

        return [
            'color' => $this->faker->safeColorName(),
            'fuel_type' => $this->faker->vehicleFuelType(),
            'manufacture_year' => $this->faker->numberBetween(1995, 2022),
            'engine_capacity' => $this->faker->randomFloat(1, 1, 5),
            'mileage' => $this->faker->numberBetween(0, 300000),
            'manufacturer_id' => Manufacturer::factory(),
            'vehicle_type_id' => VehicleType::factory()
        ];
    }
}
