<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleMonitoring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::truncate();

        foreach (range(1,2) as $branch) {
            Vehicle::factory()->count(5)->create([
                'branch_id' => $branch,
                'type' => 'goods',
            ])->each(function($vehicle){
                $this->vehicleMonitoring($vehicle);
            });

            Vehicle::factory()->count(5)->create([
                'branch_id' => $branch,
                'type' => 'people',
            ])->each(function($vehicle){
                $this->vehicleMonitoring($vehicle);
            });

            Vehicle::factory()->count(5)->create([
                'branch_id' => $branch,
                'ownership' => 'rent'
            ])->each(function($vehicle){
                $this->vehicleMonitoring($vehicle);
            });

            Vehicle::factory()->count(2)->create([
                'branch_id' => $branch,
                'status' => 'booked'
            ])->each(function($vehicle){
                $this->vehicleMonitoring($vehicle);
            });

            Vehicle::factory()->count(2)->create([
                'branch_id' => $branch,
                'status' => 'maintenance'
            ])->each(function($vehicle){
                $this->vehicleMonitoring($vehicle);
            });
        }
    }

    public function vehicleMonitoring($vehicle) {
        VehicleMonitoring::factory()->create([
            'vehicle_id' => $vehicle->id,
            'type' => 'fuel-refill',
            'fuel' => 200,
            'created_at' => now()->subWeek()
        ]);

        foreach (range(1,4) as $count) {
            VehicleMonitoring::factory()->create([
                'vehicle_id' => $vehicle->id,
                'type' => 'fuel-usage',
                'fuel' => 20,
                'created_at' => now()->subDays($count)
            ]);

            VehicleMonitoring::factory()->create([
                'vehicle_id' => $vehicle->id,
                'type' => 'maintenance',
                'fuel' => 0,
                'created_at' => now()->subMonths($count)
            ]);
        }
    }
}
