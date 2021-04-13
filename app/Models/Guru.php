<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru extends Model
{
    protected $table = 'Guru';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password', 'nama_guru', 'status', 'nip'];

    public function showguru()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function createguru($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deleteguru($primaryKey)
    {
        return $this->db->table($this->table)->delete(['id_user' => $primaryKey]);
    }
}
