<?php

namespace Core;

class Controller
{
    // Fungsi untuk memanggil file View (tampilan HTML)
    public function view($view, $data = [])
    {
        // Ekstrak data agar bisa dipanggil sebagai variabel di View
        extract($data);
        require_once '../app/Views/' . $view . '.php';
    }

    // Fungsi untuk memanggil Model (koneksi database)
    public function model($model)
    {
        $modelClass = "\\App\\Models\\" . $model;
        return new $modelClass();
    }
}
