<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['role' => \App\Helpers\MainHelper::ROLE_ADMIN]);
        Permission::create(['role' => \App\Helpers\MainHelper::ROLE_MANAGER]);
        Permission::create(['role' => \App\Helpers\MainHelper::ROLE_USER]);
    }
}
