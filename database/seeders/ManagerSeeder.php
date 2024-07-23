<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manager;
use App\Helpers\MainHelper;
use App\Models\Permission;

class ManagerSeeder extends Seeder
{
    public function run()
    {
        // Get role IDs from permissions table
        $adminRole = Permission::where('role', MainHelper::ROLE_ADMIN)->firstOrFail();
        $managerRole = Permission::where('role', MainHelper::ROLE_MANAGER)->firstOrFail();
        $userRole = Permission::where('role', MainHelper::ROLE_USER)->firstOrFail();

        Manager::create([
            'user_id' => 1,
            'status_id' => 1,
            'role_id' => $adminRole->id,
        ]);

        Manager::create([
            'user_id' => 2,
            'status_id' => 2,
            'role_id' => $managerRole->id,
        ]);

        Manager::create([
            'user_id' => 3,
            'status_id' => 3,
            'role_id' => $userRole->id,
        ]);
    }
}
