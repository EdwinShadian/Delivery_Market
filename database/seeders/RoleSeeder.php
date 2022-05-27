<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'Manager',
            'Storekeeper',
            'Courier',
        ];

        for ($i = 1; $i < 5; $i++) {
            Role::factory()->create([
                'id' => $i,
                'name' => $roles[$i - 1],
            ]);
        }
    }
}
