<?php

namespace App\Models;

use CodeIgniter\Model;

class Mapel extends Model
{
    protected $table = 'Mata_pelajaran';

    protected $primaryKey = 'id_mapel';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_mapel', 'id_user', 'nama_mapel', 'materi'];
}
