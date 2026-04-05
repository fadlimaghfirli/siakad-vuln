<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ForumModel;

class ForumController extends Controller
{
    public function index()
    {
        $model = new ForumModel();
        $data = [
            'title' => 'Forum Diskusi - SIAKAD Vuln',
            'forum' => $model->getAll()
        ];
        $this->view('layouts/header', $data);
        $this->view('forum/index', $data);
        $this->view('layouts/footer');
    }

    public function simpan()
    {
        // VULN XSS TETAP ADA DI SINI
        $topik = isset($_POST['topik']) ? $_POST['topik'] : '';
        $isi = isset($_POST['isi']) ? $_POST['isi'] : '';

        session_start();
        $penulis = isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonim';

        $model = new ForumModel();
        $model->tambah($topik, $isi, $penulis);

        header("Location: /forum");
        exit;
    }
}
