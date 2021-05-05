<?php

namespace App\Models;

use CodeIgniter\Model;

class Jawaban extends Model
{
    protected $table = 'Jawaban';

    protected $primaryKey = 'id_jawaban';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_paket', 'id_kerjakan', 'id_nilai', 'jawaban_soal', 'status_jawaban', 'skor_jawaban'];
}
