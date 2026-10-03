<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'full_name', 'email', 'password', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged  = true;

    protected $validationRules  = [];
    protected $validationMessages = [];
    protected $customTrigers     = [];

    public function findByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }

    public function getDemoUser()
    {
        return $this->first();
    }
}
