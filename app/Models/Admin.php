<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table = 'Admin';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_user', 'username', 'password', 'nama_admin',  'status'];

    public function getAdmin($username)
    {
        return $this->table($this->table)->Where(['username', $username]);
    }
}
