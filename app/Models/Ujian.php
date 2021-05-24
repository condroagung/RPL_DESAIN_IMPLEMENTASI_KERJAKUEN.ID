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

    public function ujian($primaryKey)
    {
        return $this->db->table($this->table)
            ->where('id_ujian', $primaryKey)
            ->get()->getResultArray();
    }

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

    public function rekapujian($id)
    {
        return $this->db->table($this->table)
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = Paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->where('paket.id_user', $id)
            ->get()->getResultArray();
    }

    public function hasilujian($id)
    {
        return $this->db->table($this->table)
            ->selectMax('skor_akhir')
            ->groupBy('ujian.id_user')
            ->join('Siswa', 'ujian.id_user = siswa.id_user')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = Paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->where('ujian.id_modul', $id)
            ->get()->getResultArray();
    }

    public function hasil($id)
    {
        return $this->db->table($this->table)
            ->join('Siswa', 'ujian.id_user = siswa.id_user')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = Paket.id_paket')
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->where('ujian.id_modul', $id)
            ->get()->getResultArray();
    }

    public function sumhasilujian($id, $kelas)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->selectMax('skor_akhir', 'skor_tertinggi')
            ->groupBy('modul.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.kelas', $kelas)
            ->where('ujian.id_user', $id)
            ->orderBy('paket.id_paket', 'ASC')
            ->get()->getResultArray();
    }

    public function hasilmax($id, $id_user)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->selectMax('skor_akhir', 'skor_tertinggi')
            ->groupBy('modul.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_paket', $id)
            ->where('ujian.id_user', $id_user)
            ->orderBy('modul.id_modul', 'ASC')
            ->get()->getResultArray();
    }

    public function avghasilujian($id, $kelas)
    {
        return $this->db->table($this->table)
            ->selectAvg('skor_akhir')
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.kelas', $kelas)
            ->where('ujian.id_user', $id)
            ->get()->getResultArray();
    }

    public function countmoduldone($id, $id_user)
    {
        return $this->db->table($this->table)
            ->selectCount('ujian.id_ujian')
            ->groupBy('modul.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->where('ujian.id_user', $id_user)
            ->countAllResults();
    }

    public function countmodullist($id)
    {
        return $this->db->table($this->table)
            ->selectCount('ujian.id_modul')
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('ujian.id_user', $id)
            ->get()->getResultArray();
    }

    public function countmoduldoneguru($id)
    {
        return $this->db->table($this->table)
            ->selectCount('ujian.id_ujian')
            ->groupBy('modul.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->countAllResults();
    }

    public function countmodulguru($id)
    {
        return $this->db->table($this->table)
            ->selectCount('ujian.id_modul')
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_user', $id)
            ->get()->getResultArray();
    }

    public function counttotalnilai($id)
    {
        return $this->db->table($this->table)
            ->selectSum('ujian.skor_akhir')
            ->groupBy('modul.id_paket')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_user', $id)
            ->get()->getResultArray();
    }

    public function maxnilai($id)
    {
        return $this->db->table($this->table)
            ->selectMax('ujian.skor_akhir')
            ->groupBy('ujian.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_user', $id)
            ->orderBy('modul.id_modul', 'ASC')
            ->get()->getResultArray();
    }

    public function avgallujian($id)
    {
        return $this->db->table($this->table)
            ->selectAvg('ujian.skor_akhir')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->get()->getResultArray();
    }

    public function countmoduldoneujian($id)
    {
        return $this->db->table($this->table)
            ->selectCount('ujian.id_ujian')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id)
            ->countAllResults();
    }

    public function jawabanujian($id, $id_user)
    {
        return $this->db->table($this->table)
            ->join('Modul', 'ujian.id_modul = modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('ujian.id_modul', $id)
            ->where('ujian.id_user', $id_user)
            ->get()->getResultArray();
    }

    public function avgpaket($id, $id_user)
    {
        return $this->db->table($this->table)
            ->selectMax('skor_akhir')
            ->groupBy('ujian.id_modul')
            ->join('Modul', 'ujian.id_modul = Modul.id_modul')
            ->join('Paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_paket', $id)
            ->where('ujian.id_user', $id_user)
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

    public function deleteujian($primaryKey)
    {
        return $this->db->table($this->table)->delete(['id_ujian' => $primaryKey]);
    }
}
