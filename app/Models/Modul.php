<?php

namespace App\Models;

use CodeIgniter\Model;

class Modul extends Model
{
    protected $table = 'Modul';

    protected $primaryKey = 'id_modul';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_modul', 'id_paket', 'judul_modul', 'modul_ke', 'rata_waktu', 'status_modul'];

    public function showmodul($id)
    {
        return $this->db->table($this->table)
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('modul.id_paket', $id)
            ->get()->getResultArray();
    }

    public function createmodul($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function countModul($id_paket)
    {
        return $this->db->table($this->table)
            ->where('modul.id_paket', $id_paket)
            ->countAllResults();
    }
}
