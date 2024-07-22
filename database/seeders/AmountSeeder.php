<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Amount;

class AmountSeeder extends Seeder
{
    public function run()
    {
        Amount::create([
            'project_id' => 1,
            'status_id' => 1,
            'profit' => 10000,
            'outlay' => 5000,
        ]);

        Amount::create([
            'project_id' => 2,
            'status_id' => 2,
            'profit' => 15000,
            'outlay' => 7000,
        ]);

        Amount::create([
            'project_id' => 3,
            'status_id' => 3,
            'profit' => 20000,
            'outlay' => 10000,
        ]);
    }
}
