<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d');

        $data = [
            [
                'title'     => 'Review project proposal',
                'status'    => 'pending',
                'task_date' => $today,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'     => 'Submit expense reports',
                'status'    => 'pending',
                'task_date' => $today,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'     => 'Team standup meeting',
                'status'    => 'completed',
                'task_date' => $today,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'     => 'Update project documentation',
                'status'    => 'pending',
                'task_date' => $today,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'     => 'Prepare client presentation',
                'status'    => 'in_progress',
                'task_date' => $today,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'     => 'Fix login page bug',
                'status'    => 'completed',
                'task_date' => date('Y-m-d', strtotime('-1 day')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'title'     => 'Deploy staging environment',
                'status'    => 'completed',
                'task_date' => date('Y-m-d', strtotime('-2 days')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'title'     => 'Conduct code review for PR #42',
                'status'    => 'pending',
                'task_date' => date('Y-m-d', strtotime('-1 day')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'title'     => 'Write unit tests for auth module',
                'status'    => 'in_progress',
                'task_date' => date('Y-m-d', strtotime('-3 days')),
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
            [
                'title'     => 'Plan sprint retrospective',
                'status'    => 'pending',
                'task_date' => date('Y-m-d', strtotime('+1 day')),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}
