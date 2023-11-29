<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::truncate();

        Branch::factory()->create([
            'name' => 'Pusat',
        ]);

        Branch::factory()->create([
            'name' => 'Cabang Kota A',
        ]);
    }
}
