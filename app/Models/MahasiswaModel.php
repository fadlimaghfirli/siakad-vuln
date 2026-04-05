<?php

namespace App\Models;

use Core\Database;
use PDOException;
use PDO;

class MahasiswaModel
{
    private $db;
    public $sql_error = null; // Tambahan: untuk menyimpan error

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll($keyword = '')
    {
        if ($keyword != '') {
            $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%" . $keyword . "%' OR nim LIKE '%" . $keyword . "%'";
        } else {
            // Jika tidak mencari, tampilkan 10 saja agar rapi
            $sql = "SELECT * FROM mahasiswa LIMIT 10";
        }

        try {
            $stmt = $this->db->dbh->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // PERBAIKAN: Jangan gunakan die(). Simpan pesan errornya saja
            $this->sql_error = $e->getMessage() . " | Query: " . $sql;
            return []; // Kembalikan array kosong agar tabel tidak error
        }
    }
}
