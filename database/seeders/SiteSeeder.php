<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::truncate();

        foreach (range(1,6) as $count) {
            Site::factory()->create([
                'branch_id' => 2,
                'name' => 'Tambang '.$count
            ]);
        }
    }
}
