<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Fixed dates centered on September 26, 2026
        $today       = '2026-09-26';
        $yesterday   = '2026-09-25';
        $twoDaysAgo  = '2026-09-24';
        $threeDaysAgo = '2026-09-23';

        $data = [
            [
                'title'     => 'Review project proposal',
                'status'    => 'pending',
                'task_date' => $today,
                'created_at' => '2026-09-26 10:00:00',
            ],
            [
                'title'     => 'Submit expense reports',
                'status'    => 'pending',
                'task_date' => $today,
                'created_at' => '2026-09-26 10:00:00',
            ],
            [
                'title'     => 'Team standup meeting',
                'status'    => 'completed',
                'task_date' => $today,
                'created_at' => '2026-09-26 10:00:00',
            ],
            [
                'title'     => 'Update project documentation',
                'status'    => 'pending',
                'task_date' => $today,
                'created_at' => '2026-09-26 10:00:00',
            ],
            [
                'title'     => 'Prepare client presentation',
                'status'    => 'in_progress',
                'task_date' => $today,
                'created_at' => '2026-09-26 10:00:00',
            ],
            [
                'title'     => 'Fix login page bug',
                'status'    => 'completed',
                'task_date' => $yesterday,
                'created_at' => '2026-09-25 10:00:00',
            ],
            [
                'title'     => 'Deploy staging environment',
                'status'    => 'completed',
                'task_date' => $twoDaysAgo,
                'created_at' => '2026-09-24 10:00:00',
            ],
            [
                'title'     => 'Conduct code review for PR #42',
                'status'    => 'pending',
                'task_date' => $yesterday,
                'created_at' => '2026-09-25 10:00:00',
            ],
            [
                'title'     => 'Write unit tests for auth module',
                'status'    => 'in_progress',
                'task_date' => $threeDaysAgo,
                'created_at' => '2026-09-23 10:00:00',
            ],
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}
