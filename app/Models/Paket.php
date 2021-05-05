<?php

namespace App\Models;

use CodeIgniter\Model;

class Paket extends Model
{
    protected $table = 'Paket';

    protected $primaryKey = 'id_paket';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_paket', 'id_mapel', 'nama_paket', 'durasi', 'banyak_soal', 'skor_paket', 'waktu_pengerjaan'];
}
