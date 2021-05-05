<?php

namespace App\Models;

use CodeIgniter\Model;

class Modul extends Model
{
    protected $table = 'modul';

    protected $primaryKey = 'id_modul';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_modul', 'id_paket', 'rata_waktu'];
}
