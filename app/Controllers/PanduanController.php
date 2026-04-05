<?php

namespace App\Controllers;

use Core\Controller;

class PanduanController extends Controller
{
    public function index()
    {
        // Tetap jalankan session start karena mungkin user mengakses ini saat login atau belum login
        // Jika ada Notice session, pastikan session_start() global di index.php sudah cukup.

        $data = ['title' => 'Panduan & Edukasi Keamanan - SIAKAD Vuln'];

        // Kita butuh layout agar halamannya memiliki navbar
        $this->view('layouts/header', $data);
        $this->view('panduan/index', $data);
        $this->view('layouts/footer');
    }
}
