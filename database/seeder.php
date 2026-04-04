<?php
// Izinkan script berjalan lama jika datanya banyak
set_time_limit(0);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Database.php';

use Core\Database;

echo "Memulai proses seeding database...\n";

// Inisialisasi Database
$db = new Database();
$pdo = $db->dbh;

// Inisialisasi Faker dengan data lokal Indonesia
$faker = Faker\Factory::create('id_ID');

try {
    // 1. Kosongkan tabel sebelum diisi
    $pdo->query("TRUNCATE TABLE users");
    $pdo->query("TRUNCATE TABLE mahasiswa");
    $pdo->query("TRUNCATE TABLE mata_kuliah");
    $pdo->query("TRUNCATE TABLE pengumuman");

    // 2. Buat Akun Admin
    $passwordAdmin = md5('admin123'); // Sengaja pakai MD5 agar terlihat 'legacy' dan rentan dicrack
    $pdo->query("INSERT INTO users (username, password, role) VALUES ('admin', '$passwordAdmin', 'admin')");
    echo "[-] Akun Admin berhasil dibuat.\n";

    // 3. Generate 100 Data Mahasiswa
    echo "[-] Membuat 100 data mahasiswa...\n";
    $stmtMhs = $pdo->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, email, alamat) VALUES (?, ?, ?, ?, ?, ?)");

    $jurusan_list = ['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Manajemen Informatika', 'Sains Data'];

    for ($i = 0; $i < 100; $i++) {
        $tahun = $faker->numberBetween(2020, 2023);
        $nim = $tahun . '10' . str_pad($i + 1, 3, '0', STR_PAD_LEFT);

        $nama = $faker->name;
        $jurusan = $faker->randomElement($jurusan_list);
        $angkatan = $tahun;
        $email = strtolower(str_replace(' ', '.', $nama)) . '@kampus.ac.id';
        $alamat = $faker->address;

        $stmtMhs->execute([$nim, $nama, $jurusan, $angkatan, $email, $alamat]);
    }

    // 4. Generate 20 Mata Kuliah
    echo "[-] Membuat 20 data mata kuliah...\n";
    $stmtMk = $pdo->prepare("INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester) VALUES (?, ?, ?, ?)");
    for ($i = 1; $i <= 20; $i++) {
        $kode = 'MK' . $faker->unique()->numerify('###');
        $nama_mk = ucwords($faker->words(3, true));
        $sks = $faker->numberBetween(2, 4);
        $semester = $faker->numberBetween(1, 8);
        $stmtMk->execute([$kode, $nama_mk, $sks, $semester]);
    }

    // 5. Generate 5 Pengumuman Normal
    echo "[-] Membuat data pengumuman...\n";
    $stmtPengumuman = $pdo->prepare("INSERT INTO pengumuman (judul, isi, tanggal, penulis) VALUES (?, ?, ?, ?)");
    for ($i = 0; $i < 5; $i++) {
        $judul = "Informasi Akademik: " . ucwords($faker->words(4, true));
        $isi = "<p>" . $faker->paragraph(3) . "</p>"; // Format HTML biasa
        $tanggal = $faker->date('Y-m-d');
        $penulis = "Admin Akademik";
        $stmtPengumuman->execute([$judul, $isi, $tanggal, $penulis]);
    }

    echo "\n=== SEEDING SELESAI! ===\n";
    echo "Database siakad_vuln_db siap digunakan untuk simulasi.\n";
} catch (PDOException $e) {
    echo "Error saat seeding: " . $e->getMessage();
}
