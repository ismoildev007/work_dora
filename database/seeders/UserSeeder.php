<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Admin1',
            'status_id' => 1,
            'email' => 'admin1@dmail.com',
            'password' => Hash::make('admin1@gmail.com'),
            'telegram' => '@johndoe',
            'phone_number' => '123456789',
            'address' => '123 Main St, City, Country',
        ]);
        $user->assignRole("admin");

        $user = User::create([
            'name' => 'Admin2',
            'status_id' => 2,
            'email' => 'admin2@gamil.com',
            'password' => Hash::make('admin2@gmail.com'),
            'telegram' => '@janesmith',
            'phone_number' => '987654321',
            'address' => '456 Elm St, City, Country',
        ]);
        $user->assignRole("admin");

        $user = User::create([
            'name' => 'Admin3',
            'status_id' => 3,
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('admin3@gmail.com'),
            'telegram' => 'admin@gmail.com',
            'phone_number' => '555555555',
            'address' => '789 Oak St, City, Country',
        ]);
        $user->assignRole("admin");
    }
}
