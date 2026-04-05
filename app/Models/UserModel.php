<?php

namespace App\Models;

use Core\Database;
use PDOException;
use PDO;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($akun_kampus, $password)
    {
        // 🚨 VULNERABILITY (SQLi): Celah tetap dipertahankan namun target kolomnya berubah
        $sql = "SELECT * FROM users WHERE akun_kampus = '$akun_kampus' AND password = '$password'";

        try {
            $stmt = $this->db->dbh->query($sql);
            if ($stmt) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return false;
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    }
}
