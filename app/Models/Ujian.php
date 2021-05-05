<?php

namespace App\Models;

use CodeIgniter\Model;

class Ujian extends Model
{
    protected $table = 'Kerjakan';

    protected $primaryKey = 'id_kerjakan';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_kerjakan', 'id_modul', 'id_user', 'waktu_mulai', 'waktu_berakhir'];
}
