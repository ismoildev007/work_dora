<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        Status::create([
            'name' => 'Pending',
            'color' => 'Yellow',
        ]);

        Status::create([
            'name' => 'In Progress',
            'color' => 'Blue',
        ]);

        Status::create([
            'name' => 'Completed',
            'color' => 'Green',
        ]);
    }
}
