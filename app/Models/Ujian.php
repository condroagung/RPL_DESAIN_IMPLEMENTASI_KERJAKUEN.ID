<?php

namespace App\Models;

use CodeIgniter\Model;

class Ujian extends Model
{
    protected $table = 'Ujian';

    protected $primaryKey = 'id_ujian';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_ujian', 'id_modul', 'id_user', 'waktu_mulai', 'waktu_berakhir', 'skor_akhir'];

    public function showhasilujianmurid($id)
    {
        return $this->db->table($this->table)
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = Paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->where('ujian.id_user', $id)
            ->get()->getResultArray();
    }

    public function sumhasilujian($kelas)
    {
        return $this->db->table($this->table)
            ->selectSum('skor_akhir')
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.kelas', $kelas)
            ->get()->getResultArray();
    }

    public function avghasilujian($kelas)
    {
        return $this->db->table($this->table)
            ->selectAvg('skor_akhir')
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.kelas', $kelas)
            ->get()->getResultArray();
    }

    public function hasilmax($id)
    {
        return $this->db->table($this->table)
            ->selectMax('skor_akhir')
            ->groupBy('ujian.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_paket', $id)
            ->get()->getResultArray();
    }

    public function createujian($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateujian($data, $primaryKey)
    {
        return $this->db->table($this->table)->update($data, ['id_ujian' => $primaryKey]);
    }
}
