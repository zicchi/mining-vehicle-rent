<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::factory()->create([
            'name' => 'Admin Pusat',
            'username' => 'admin',
            'branch_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Manajer Cabang',
            'username' => 'branch_manager',
            'password' => Hash::make('123456'),
            'branch_id' => 2,
            'level' => 'branch_manager'
        ]);

        foreach (range(1,6) as $count) {
            User::factory()->create([
                'name' => 'Admin Tambang 0'.$count,
                'username' => 'admin_'.$count,
                'branch_id' => 2,
                'site_id' => $count + 1,
                'level' => 'admin'
            ]);

            User::factory()->create([
                'name' => 'Penanggung jawab Tambang 0'.$count,
                'username' => 'site_manager_'.$count,
                'password' => Hash::make('123456'),
                'branch_id' => 2,
                'site_id' => $count + 1,
                'level' => 'site_manager'
            ]);
        }
    }
}
