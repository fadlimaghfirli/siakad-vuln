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

    public function login($username, $password)
    {
        // Simulasi penggunaan MD5 (hashing lama yang rentan di-crack)
        $hashed_password = md5($password);

        // 🚨 VULNERABILITY: Menggabungkan input username langsung ke dalam string query.
        // Jika username diisi: admin' -- -
        // Maka query menjadi: SELECT * FROM users WHERE username = 'admin' -- -' AND password = '...'
        // Tanda -- - akan mengomentari (mengabaikan) pengecekan password di belakangnya!

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";

        try {
            $stmt = $this->db->dbh->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        }
    }
}
