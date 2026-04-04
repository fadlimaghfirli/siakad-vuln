<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Beranda - SIAKAD Vuln'
        ];

        // Memanggil urutan view (Header -> Konten Utama -> Footer)
        $this->view('layouts/header', $data);
        $this->view('home/index', $data);
        $this->view('layouts/footer');
    }
}
