<?php

namespace App\Models;

use CodeIgniter\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $primaryKey = 'id_paket';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_paket', 'id_user', 'id_mapel', 'kelas', 'nama_paket', 'cover'];

    public function showpaket()
    {
        return $this->db->table($this->table)
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->get()->getResultArray();
    }

    public function createpaket($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function showmodulbyguru($id)
    {
        return $this->db->table($this->table)
            ->join('mata_pelajaran', 'paket.id_mapel = mata_pelajaran.id_mapel')
            ->join('guru', 'paket.id_user = guru.id_user')
            ->where('paket.id_user', $id)
            ->get()->getResultArray();
    }

    public function showpaketbyguru($id_user)
    {
        return $this->db->table($this->table)
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('paket.id_user', $id_user)
            ->get()->getResultArray();
    }

    public function showpaketbykelas($kelas)
    {
        return $this->db->table($this->table)
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('paket.kelas', $kelas)
            ->get()->getResultArray();
    }

    public function showpaketbyid($primaryKey)
    {
        return $this->db->table($this->table)
            ->join('mata_pelajaran', 'mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('id_paket', $primaryKey)
            ->get()->getResultArray();
    }
}
