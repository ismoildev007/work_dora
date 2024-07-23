<?php
namespace Database\Seeders;

use App\Helpers\MainHelper;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'status_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
            'telegram' => '@johndoe',
            'phone_number' => '123456789',
            'address' => '123 Main St, City, Country',
            'role' => \App\Helpers\MainHelper::ROLE_ADMIN,  // O'zgartirildi
        ]);

        User::create([
            'name' => 'Manager',
            'status_id' => 2,
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager@gmail.com'),
            'telegram' => '@janesmith',
            'phone_number' => '987654321',
            'address' => '456 Elm St, City, Country',
            'role' => \App\Helpers\MainHelper::ROLE_MANAGER,  // O'zgartirildi
        ]);

        User::create([
            'name' => 'User',
            'status_id' => 3,
            'email' => 'user@gmail.com',
            'password' => Hash::make('user@gmail.com'),
            'telegram' => '@user',
            'phone_number' => '555555555',
            'address' => '789 Oak St, City, Country',
            'role' => \App\Helpers\MainHelper::ROLE_USER,  // O'zgartirildi
        ]);
    }

}

