<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks     = $taskModel->getAllTasks();

        return view('tasks/index', [
            'tasks' => $tasks,
        ]);
    }
}
