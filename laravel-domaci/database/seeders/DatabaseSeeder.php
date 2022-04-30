<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\Manufacturer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        VehicleType::truncate();
        Manufacturer::truncate();
        Vehicle::truncate();
        // \App\Models\User::factory(10)->create();
        Vehicle::factory(5)->create();
    }
}
