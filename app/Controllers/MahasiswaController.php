<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    public function index()
    {
        // 1. Cek apakah sudah login
        if (!isset($_SESSION['username'])) {
            header("Location: /login?msg=unauthorized");
            exit;
        }

        // 2. PROTEKSI ROLE: Hanya admin yang boleh akses data mahasiswa
        if ($_SESSION['role'] !== 'admin') {
            // Jika mahasiswa mencoba akses, lempar ke dashboard
            header("Location: /dashboard");
            exit;
        }

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
