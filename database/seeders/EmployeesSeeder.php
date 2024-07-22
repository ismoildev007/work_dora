<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    public function run()
    {
        Employees::create([
            'user_id' => 1,
            'department_id' => 1,
            'status_id' => 1,
            'role' => 'Developer',
        ]);

        Employees::create([
            'user_id' => 2,
            'status_id' => 2,
            'department_id' => 2,
            'role' => 'Designer',
        ]);

        Employees::create([
            'user_id' => 3,
            'department_id' => 3,
            'status_id' => 3,
            'role' => 'QA',
        ]);
    }
}
