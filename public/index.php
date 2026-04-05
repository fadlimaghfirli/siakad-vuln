<?php
session_start();

// Memanggil autoload Composer agar kita tidak perlu require file satu-satu
require_once __DIR__ . '/../vendor/autoload.php';

// Menjalankan class App (Router utama kita)
$app = new Core\App();
