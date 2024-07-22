<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkSeeder extends Seeder
{
    public function run()
    {
        Work::create([
            'project_id' => 1,
            'manager_id' => 1,
            'status_id' => 1,
            'title' => 'Design Phase',
            'description' => 'Complete the design for the new website',
            'deadline' => '2024-07-31',
            'image' => 'design.png',
            'images' => '["design1.png", "design2.png"]',
        ]);

        Work::create([
            'project_id' => 2,
            'manager_id' => 2,
            'status_id' => 2,
            'title' => 'Development Phase',
            'description' => 'Start developing the mobile app',
            'deadline' => '2024-08-15',
            'image' => 'development.png',
            'images' => '["dev1.png", "dev2.png"]',
        ]);

        Work::create([
            'project_id' => 3,
            'manager_id' => 3,
            'status_id' => 3,
            'title' => 'Marketing Research',
            'description' => 'Conduct research for the marketing campaign',
            'deadline' => '2024-07-20',
            'image' => 'research.png',
            'images' => '["research1.png", "research2.png"]',
        ]);
    }
}
