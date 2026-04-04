<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $user = 'root'; // Default Laragon
    private $pass = '';     // Default Laragon kosong
    private $dbname = 'siakad-vuln';

    public $dbh; // Database Handler
    public $error;

    public function __construct()
    {
        // Set DSN (Data Source Name)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Buat instance PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("Koneksi Database Gagal: " . $this->error . ". Pastikan database 'siakad_vuln_db' sudah dibuat di phpMyAdmin/HeidiSQL.");
        }
    }
}
