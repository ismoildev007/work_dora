<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manager;

class ManagerSeeder extends Seeder
{
    public function run()
    {
        Manager::create([
            'user_id' => 1,
            'status_id' => 1,
            'role' => 'Project Manager',
        ]);

        Manager::create([
            'user_id' => 2,
            'status_id' => 2,
            'role' => 'Team Leader',
        ]);

        Manager::create([
            'user_id' => 3,
            'status_id' => 3,
            'role' => 'Department Head',
        ]);
    }
}
