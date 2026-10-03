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

    public function create()
    {
        return view('tasks/new');
    }

    public function store()
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date',
        ];

        if (! $this->validate($rules)) {
            return view('tasks/new', [
                'validation' => $this->validator,
            ]);
        }

        $taskModel->save([
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status') ?? 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')
                           ->with('success', 'Task created successfully.');
    }

    public function edit($id = null)
    {
        $taskModel = new TaskModel();
        $task      = $taskModel->find($id);

        if ($task === null || $task['is_archived']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function update($id = null)
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required|min_length[3]|max_length[150]',
            'task_date' => 'required|valid_date',
        ];

        if (! $this->validate($rules)) {
            return view('tasks/edit', [
                'task'       => $taskModel->find($id),
                'validation' => $this->validator,
            ]);
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')
                           ->with('success', 'Task updated successfully.');
    }

    public function delete($id = null)
    {
        $taskModel = new TaskModel();
        $taskModel->softDelete((int) $id);

        return redirect()->to('/tasks')
                           ->with('success', 'Task archived successfully.');
    }
}
