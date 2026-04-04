<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mhsModel = new MahasiswaModel();
        $keyword = isset($_GET['q']) ? $_GET['q'] : '';

        $data = [
            'title' => 'Data Mahasiswa - SIAKAD Vuln',
            'mahasiswa' => $mhsModel->getAll($keyword),
            'keyword' => $keyword,
            'sql_error' => $mhsModel->sql_error
        ];

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('layouts/footer');
    }
}
