<?php

namespace App\Models;

use CodeIgniter\Model;

class Soal extends Model
{
    protected $table = 'Soal';

    protected $primaryKey = 'id_soal';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_soal', 'id_modul', 'bunyi_soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'skor_soal', 'kunci_jawaban'];

    public function createsoal($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function showsoal($id)
    {
        return $this->db->table($this->table)
            ->join('Modul', 'soal.id_modul = modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('soal.id_modul', $id)
            ->get()->getResultArray();
    }
}
