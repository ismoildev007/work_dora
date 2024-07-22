<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'name' => 'Client A',
            'status_id' => 1,
            'phone_number' => '123456789',
            'website' => 'http://clienta.com',
            'address' => 'Address A',
        ]);

        Client::create([
            'name' => 'Client B',
            'status_id' => 2,
            'phone_number' => '987654321',
            'website' => 'http://clientb.com',
            'address' => 'Address B',
        ]);

        Client::create([
            'name' => 'Client C',
            'status_id' => 3,
            'phone_number' => '555555555',
            'website' => 'http://clientc.com',
            'address' => 'Address C',
        ]);
    }
}
