<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'role:viewAny']);
        Permission::create(['name' => 'role:view']);
        Permission::create(['name' => 'role:assign']);
        Permission::create(['name' => 'role:create']);
        Permission::create(['name' => 'role:update']);
        Permission::create(['name' => 'role:delete']);
        Permission::create(['name' => 'role:restore']);
        Permission::create(['name' => 'permission:viewAny']);
        Permission::create(['name' => 'permission:view']);
        Permission::create(['name' => 'permission:assign']);
        Permission::create(['name' => 'permission:create']);
        Permission::create(['name' => 'permission:update']);
        Permission::create(['name' => 'permission:delete']);
        Permission::create(['name' => 'permission:restore']);
        Permission::create(['name' => 'user:viewAny']);
        Permission::create(['name' => 'user:view']);
        Permission::create(['name' => 'user:create']);
        Permission::create(['name' => 'user:update']);
        Permission::create(['name' => 'user:delete']);
        Permission::create(['name' => 'user:restore']);

        $statsPermission = Permission::create(['name' => 'stats:view']);
        $role->givePermissionTo($statsPermission);

    }
}
