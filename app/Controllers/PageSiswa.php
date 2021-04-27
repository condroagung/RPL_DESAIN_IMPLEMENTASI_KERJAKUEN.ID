<?php

namespace App\Controllers;

use App\Models\Siswa;

class PageSiswa extends BaseController
{

    protected $siswa;

    function __construct()
    {
        $this->siswa = new Siswa();
    }

    public function index()
    {
        echo view('siswa/dashboard_siswa');
    }




    //--------------------------------------------------------------------

}
