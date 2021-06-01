<?php

namespace App\Models;

use CodeIgniter\Model;

class Modul extends Model
{
    protected $table = 'modul';

    protected $primaryKey = 'id_modul';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_modul', 'id_paket', 'judul_modul', 'modul_ke', 'rata_waktu', 'status_modul'];

    public function showmodul($id)
    {
        return $this->db->table($this->table)
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('modul.id_paket', $id)
            ->orderBy('modul.id_modul', 'ASC')
            ->get()->getResultArray();
    }

    public function showmodulbykelas($kelas)
    {
        return $this->db->table($this->table)
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('paket.kelas', $kelas)
            ->orderBy('paket.id_paket', 'ASC')
            ->get()->getResultArray();
    }

    public function createmodul($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function namamodul($id)
    {
        return $this->db->table($this->table)
            ->where('id_modul', $id)
            ->get()->getResultArray();
    }

    public function countModul($id_paket)
    {
        return $this->db->table($this->table)
            ->where('modul.id_paket', $id_paket)
            ->countAllResults();
    }

    public function avgtime($id_paket)
    {
        return $this->db->table($this->table)
            ->selectAvg('rata_waktu')
            ->groupBy('modul.id_paket')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id_paket)
            ->get()->getResultArray();
    }

    public function check_avgtime($id_paket)
    {
        return $this->db->table($this->table)
            ->selectAvg('rata_waktu')
            ->groupBy('modul.id_paket')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('modul.id_paket', $id_paket)
            ->countAllResults();
    }

    public function countmodulbyGuru($id)
    {
        return $this->db->table($this->table)
            ->selectCount('modul.id_modul')
            ->groupBy('modul.id_paket')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.id_user', $id)
            ->orderBy('paket.id_paket', 'ASC')
            ->get()->getResultArray();
    }

    public function countModulbyPaket($kelas)
    {
        return $this->db->table($this->table)
            ->select('modul.id_paket')
            ->selectCount('id_modul')
            ->groupBy('modul.id_paket')
            ->join('paket', 'modul.id_paket = paket.id_paket')
            ->where('paket.kelas', $kelas)
            ->orderBy('paket.id_paket', 'ASC')
            ->get()->getResultArray();
    }
    public function deletemodul($primaryKey)
    {
        return $this->db->table($this->table)->delete(['id_modul' => $primaryKey]);
    }

    public function updatemodul($data, $primaryKey)
    {
        return $this->db->table($this->table)->update($data, ['id_modul' => $primaryKey]);
    }
}
