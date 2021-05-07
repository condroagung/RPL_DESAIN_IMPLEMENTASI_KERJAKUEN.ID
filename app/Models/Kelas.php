<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_kelas', 'nama_kelas'];

    public function showkelas()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }
}
