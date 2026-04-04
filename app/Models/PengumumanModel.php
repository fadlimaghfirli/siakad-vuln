<?php

namespace App\Models;

use Core\Database;
use PDOException;
use PDO;

class PengumumanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        // Menampilkan dari yang terbaru
        $stmt = $this->db->dbh->query("SELECT * FROM pengumuman ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambah($judul, $isi, $penulis)
    {
        $tanggal = date('Y-m-d');

        $sql = "INSERT INTO pengumuman (judul, isi, tanggal, penulis) VALUES (?, ?, ?, ?)";

        try {
            $stmt = $this->db->dbh->prepare($sql);
            $stmt->execute([$judul, $isi, $tanggal, $penulis]);
            return true;
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    }
}
