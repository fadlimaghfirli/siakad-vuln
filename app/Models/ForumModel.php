<?php

namespace App\Models;

use Core\Database;
use PDOException;
use PDO;

class ForumModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $stmt = $this->db->dbh->query("SELECT * FROM forum ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambah($topik, $isi, $penulis)
    {
        $tanggal = date('Y-m-d');
        // Menggunakan prepared statement agar XSS tidak tumpang tindih dengan SQLi
        $sql = "INSERT INTO forum (topik, isi, tanggal, penulis) VALUES (?, ?, ?, ?)";
        try {
            $stmt = $this->db->dbh->prepare($sql);
            $stmt->execute([$topik, $isi, $tanggal, $penulis]);
            return true;
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    }
}
