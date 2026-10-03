<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'status', 'task_date', 'is_archived', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged  = true;

    protected $validationRules  = [
        'title'     => 'required|min_length[3]|max_length[150]',
        'task_date' => 'required|valid_date',
    ];
    protected $validationMessages = [
        'title'     => [
            'required'    => 'A task title is required.',
            'min_length'  => 'The title must be at least 3 characters long.',
            'max_length'  => 'The title may not exceed 150 characters.',
        ],
        'task_date' => [
            'required'    => 'A task date is required.',
            'valid_date'  => 'Please enter a valid date.',
        ],
    ];
    protected $customTrigers     = [];

    public function getTodayTasks()
    {
        return $this->where('is_archived', false)
                    ->where('task_date', '2026-09-26')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getAllTasks()
    {
        return $this->where('is_archived', false)
                    ->orderBy('task_date', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function softDelete(int $id)
    {
        return $this->update($id, ['is_archived' => true]);
    }
}
