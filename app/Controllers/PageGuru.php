<?php

namespace App\Controllers;

use App\Models\Guru;

class PageGuru extends BaseController
{

    protected $siswa;

    function __construct()
    {
        $this->siswa = new Guru();
    }

    public function index()
    {
        echo view('guru/dashboard_guru');
    }




    //--------------------------------------------------------------------

}
