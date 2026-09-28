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
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged  = true;

    protected $validationRules  = [];
    protected $validationMessages = [];
    protected $customTrigers     = [];

    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getAllTasks()
    {
        return $this->orderBy('task_date', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
