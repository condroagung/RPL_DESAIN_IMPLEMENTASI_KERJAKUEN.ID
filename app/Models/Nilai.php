<?php

namespace App\Models;

use CodeIgniter\Model;

class Nilai extends Model
{
    protected $table = 'Nilai';

    protected $primaryKey = 'id_nilai';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_nilai', 'skor_total', 'jumlah_benar', 'waktu_selesai'];
}
