<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'client_id' => 1,
            'department_id' => 1,
            'status_id' => 1,
            'title' => 'Website Development',
            'description' => 'Developing a new company website',
            'image' => 'website.png',
            'images' => '["image1.png", "image2.png"]',
        ]);

        Project::create([
            'client_id' => 2,
            'department_id' => 2,
            'status_id' => 2,
            'title' => 'Mobile App Development',
            'description' => 'Creating a new mobile app for clients',
            'image' => 'mobile_app.png',
            'images' => '["app1.png", "app2.png"]',
        ]);

        Project::create([
            'client_id' => 3,
            'department_id' => 3,
            'status_id' => 3,
            'title' => 'Marketing Campaign',
            'description' => 'Launching a new marketing campaign',
            'image' => 'campaign.png',
            'images' => '["campaign1.png", "campaign2.png"]',
        ]);
    }
}
