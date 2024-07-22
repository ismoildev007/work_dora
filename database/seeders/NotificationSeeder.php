<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        Notification::create([
            'user_id' => 1,
            'work_id' => 1,
            'status_id' => 1,
            'massage' => 'New task assigned',
            'type' => 'Task',
            'content' => 'Please complete the new task.',
            'image' => 'task1.png',
        ]);

        Notification::create([
            'user_id' => 2,
            'work_id' => 2,
            'status_id' => 2,
            'massage' => 'Meeting scheduled',
            'type' => 'Meeting',
            'content' => 'Meeting at 10 AM in Conference Room.',
            'image' => 'meeting.png',
        ]);

        Notification::create([
            'user_id' => 3,
            'work_id' => 3,
            'status_id' => 3,
            'massage' => 'Deadline extended',
            'type' => 'Update',
            'content' => 'The project deadline has been extended by one week.',
            'image' => 'update.png',
        ]);
    }
}
