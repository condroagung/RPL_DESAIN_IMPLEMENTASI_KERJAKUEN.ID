<?php

namespace App\Models;

use CodeIgniter\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $primaryKey = 'id_soal';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_soal', 'id_modul', 'bunyi_soal', 'gambar_soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'skor_soal', 'kunci_jawaban'];

    public function createsoal($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function showsoal($id)
    {
        return $this->db->table($this->table)
            ->join('modul', 'soal.id_modul = modul.id_modul')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('soal.id_modul', $id)
            ->get()->getResultArray();
    }

    public function deletesoal($primaryKey)
    {
        return $this->db->table($this->table)->delete(['id_soal' => $primaryKey]);
    }

    public function updatesoal($data, $primaryKey)
    {
        return $this->db->table($this->table)->update($data, ['id_soal' => $primaryKey]);
    }

    public function countsoal($id)
    {
        return $this->db->table($this->table)
            ->join('modul', 'soal.id_modul = modul.id_modul')
            ->where('soal.id_modul', $id)
            ->countAllResults();
    }

    public function countsoalmodul()
    {
        return $this->db->table($this->table)
            ->join('modul', 'soal.id_modul = modul.id_modul')
            ->countAllResults();
    }

    public function countsoalbymodul($id)
    {
        return $this->db->table($this->table)
            ->selectCount('id_soal')
            ->groupBy('soal.id_modul')
            ->join('modul', 'soal.id_modul = modul.id_modul')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->get()->getResultArray();
    }

    public function totalsoalbymodul($id)
    {
        return $this->db->table($this->table)
            ->selectCount('id_soal')
            ->join('modul', 'soal.id_modul = modul.id_modul')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->countAllResults();
    }
}
