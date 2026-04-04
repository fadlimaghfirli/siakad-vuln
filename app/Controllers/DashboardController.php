<?php

namespace App\Controllers;

use Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        session_start();

        // Cek apakah user sudah login
        if (!isset($_SESSION['username'])) {
            header("Location: /login");
            exit;
        }

        $data = ['title' => 'Dashboard Intranet - SIAKAD Vuln'];

        $this->view('layouts/header', $data);

        // Tampilan langsung dirender di sini untuk kepraktisan
        echo '<div class="max-w-3xl mx-auto mt-10 bg-emerald-50 text-emerald-800 p-10 rounded-3xl border border-emerald-200 shadow-sm text-center">';
        echo '<div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>';
        echo '<h1 class="text-4xl font-bold mb-4">Akses Diberikan!</h1>';
        echo '<p class="text-lg mb-8">Selamat datang kembali, <span class="font-bold bg-emerald-200 px-2 py-1 rounded">' . htmlspecialchars($_SESSION['username']) . '</span>. Hak akses Anda adalah: <span class="uppercase font-bold">' . htmlspecialchars($_SESSION['role']) . '</span></p>';
        echo '<a href="/login/logout" class="inline-block bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-full transition-colors shadow-sm">Logout / Keluar Sesi</a>';
        echo '</div>';

        $this->view('layouts/footer');
    }
}
