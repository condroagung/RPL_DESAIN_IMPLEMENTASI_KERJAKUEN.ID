<?php

namespace App\Models;

use CodeIgniter\Model;

class Paket extends Model
{
    protected $table = 'Paket';

    protected $primaryKey = 'id_paket';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id_paket', 'id_user', 'id_mapel', 'kelas', 'nama_paket', 'cover'];

    public function showpaket()
    {
        return $this->db->table($this->table)
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->get()->getResultArray();
    }

    public function showpaketbyguru($id_user)
    {
        return $this->db->table($this->table)
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('paket.id_user', $id_user)
            ->get()->getResultArray();
    }

    public function showpaketbyid($primaryKey)
    {
        return $this->db->table($this->table)
            ->join('Mata_pelajaran', 'Mata_pelajaran.id_mapel = paket.id_mapel')
            ->join('guru', 'guru.id_user = paket.id_user')
            ->where('id_paket', $primaryKey)
            ->get()->getResultArray();
    }

    public function createpaket($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
