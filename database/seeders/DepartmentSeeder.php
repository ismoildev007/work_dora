<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'name' => 'HR',
            'status_id' => 1,
            'phone_number' => '111111111',
        ]);

        Department::create([
            'name' => 'IT',
            'status_id' => 2,
            'phone_number' => '222222222',
        ]);

        Department::create([
            'name' => 'Finance',
            'status_id' => 3,
            'phone_number' => '333333333',
        ]);
    }
}

