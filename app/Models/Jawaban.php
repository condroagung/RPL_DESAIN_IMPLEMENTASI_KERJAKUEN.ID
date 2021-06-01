<?php

namespace App\Models;

use CodeIgniter\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';

    protected $primaryKey = 'id_jawaban';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_jawaban', 'id_ujian', 'jawaban_soal', 'status_jawaban', 'skor_jawaban'];

    public function createjawaban($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function countjawabanbymodul($id, $id_user)
    {
        return $this->db->table($this->table)
            ->selectCount('id_jawaban')
            ->join('ujian', 'jawaban.id_ujian = ujian.id_ujian')
            ->join('modul', 'ujian.id_modul = modul.id_modul')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->where('ujian.id_user', $id_user)
            ->countAllResults();
    }

    public function countjawabanbymodulguru($id)
    {
        return $this->db->table($this->table)
            ->selectCount('id_jawaban')
            ->join('ujian', 'jawaban.id_ujian = ujian.id_ujian')
            ->join('modul', 'ujian.id_modul = modul.id_modul')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->countAllResults();
    }

    public function jawabanmodul($id)
    {
        return $this->db->table($this->table)
            ->join('ujian', 'jawaban.id_ujian = ujian.id_ujian')
            ->where('jawaban.id_ujian', $id)
            ->get()->getResultArray();
    }
}
