<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::truncate();
        foreach (range(1,6) as $site) {
            Driver::factory()->count(4)->create([
                'site_id' => $site
            ]);
        }
    }
}
