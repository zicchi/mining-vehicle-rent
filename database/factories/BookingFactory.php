<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => 1,
            'driver_id' => 1,
            'vehicle_id' => 1,
            'status' => 'pending',
            'booking_date' => now()->addWeek(),
            'site_manager' => 4,
            'branch_manager' => 2,
        ];
    }
}
