<?php

namespace App\Models;

use CodeIgniter\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $primaryKey = 'id_soal';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_soal', 'id_modul', 'bunyi_soal', 'gambar_soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'kunci_jawaban'];
}
