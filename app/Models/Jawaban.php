<?php

namespace App\Models;

use CodeIgniter\Model;

class Jawaban extends Model
{
    protected $table = 'Jawaban';

    protected $primaryKey = 'id_jawaban';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_jawaban', 'id_ujian', 'jawaban_soal', 'status_jawaban', 'skor_jawaban'];

    public function createjawaban($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
