<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table = 'Siswa';

    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['username', 'password', 'nama_siswa', 'kelas', 'nis', 'jenis_kelamin', 'status'];

    public function getSiswa($username)
    {
        return $this->db->table($this->table)->where('username', $username);
    }

    public function siswatertentu($primaryKey)
    {
        return $this->db->table($this->table)
            ->where('id_user', $primaryKey)
            ->get()->getResultArray();;
    }

    public function countsiswa($nis)
    {
        return $this->db->table($this->table)
            ->selectCount('nis')
            ->where('nis', $nis)
            ->countAllResults();
    }

    public function getdatabynama($nama)
    {
        return $this->db->table($this->table)
            ->where('nama_siswa', $nama)
            ->get()->getResultArray();
    }

    public function showsiswa()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function createsiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deletesiswa($primaryKey)
    {
        return $this->db->table($this->table)->delete(['id_user' => $primaryKey]);
    }

    public function updatesiswa($data, $primaryKey)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $primaryKey]);
    }
}
