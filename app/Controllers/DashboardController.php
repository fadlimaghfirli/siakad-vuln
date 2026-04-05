<?php

namespace App\Controllers;

use Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: /login");
            exit;
        }

        $data = ['title' => 'Dashboard - SIAKAD Vuln'];

        $this->view('layouts/header', $data);
        $this->view('dashboard/index', $data); // Panggil view baru
        $this->view('layouts/footer');
    }
}
