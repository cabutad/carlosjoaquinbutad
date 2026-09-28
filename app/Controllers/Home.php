<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks     = $taskModel->getTodayTasks();

        return view('pages/welcome', [
            'tasks' => $tasks,
        ]);
    }
}
