<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\PengumumanModel;

class PengumumanController extends Controller
{
    public function index()
    {
        $model = new PengumumanModel();

        $data = [
            'title' => 'Papan Pengumuman - SIAKAD Vuln',
            'pengumuman' => $model->getAll()
        ];

        $this->view('layouts/header', $data);
        $this->view('pengumuman/index', $data);
        $this->view('layouts/footer');
    }

    public function simpan()
    {
        // 🚨 VULNERABILITY XSS: Tidak ada fungsi strip_tags() atau htmlspecialchars()
        // Input dari user langsung ditangkap mentah-mentah
        $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
        $isi = isset($_POST['isi']) ? $_POST['isi'] : '';
        $penulis = isset($_POST['penulis']) ? $_POST['penulis'] : 'Anonim';

        $model = new PengumumanModel();
        $model->tambah($judul, $isi, $penulis);

        // Setelah tersimpan, arahkan kembali ke halaman pengumuman
        header("Location: /pengumuman");
        exit;
    }
}
