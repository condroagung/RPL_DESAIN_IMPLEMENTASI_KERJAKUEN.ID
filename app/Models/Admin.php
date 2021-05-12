<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Mendefinisikan model Admin
 */
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

    public function updateadmin($data, $primaryKey)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $primaryKey]);
    }
}
