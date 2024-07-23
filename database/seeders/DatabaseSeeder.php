<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            UserSeeder::class,
            DepartmentSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            PermissionSeeder::class,
            ManagerSeeder::class,

            WorkSeeder::class,
            NotificationSeeder::class,
            AmountSeeder::class,
            EmployeesSeeder::class,
        ]);
    }
}
