<?php

namespace Database\Seeders;

use App\Models\VehicleMonitoring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleMonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleMonitoring::truncate();

        VehicleMonitoring::factory()->create([
            'vehicle_id' => 1,
            'type' => 'fuel-refill',
            'fuel' => 200,
            'created_at' => now()->subWeek
        ]);

        foreach (range(1,4) as $count) {
            VehicleMonitoring::factory()->create([
                'vehicle_id' => 1,
                'type' => 'fuel-usage',
                'fuel' => 200,
                'created_at' => now()->subDays($count)
            ]);

            VehicleMonitoring::factory()->create([
                'vehicle_id' => 1,
                'type' => 'maintenance',
                'fuel' => 0,
                'created_at' => now()->subMonths($count)
            ]);
        }
    }
}
