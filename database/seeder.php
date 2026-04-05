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
    $pdo->query("TRUNCATE TABLE forum");

    // 2. Buat Akun Admin (Target Eksploitasi SQLi)
    // Akun kampus diset 'admin' agar payload login "admin' -- -" tetap berfungsi
    $passwordAdmin = 'password_sangat_rahasia_123';
    $pdo->query("INSERT INTO users (akun_kampus, username, password, role) VALUES ('admin', 'Administrator Kampus', '$passwordAdmin', 'admin')");
    echo "[-] Akun Admin berhasil dibuat.\n";

    // 3. Generate 100 Data Mahasiswa & Akun Loginnya
    echo "[-] Membuat 100 data mahasiswa & akun login...\n";
    $stmtMhs = $pdo->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, email, alamat) VALUES (?, ?, ?, ?, ?, ?)");
    $stmtUser = $pdo->prepare("INSERT INTO users (akun_kampus, username, password, role) VALUES (?, ?, ?, ?)");

    $jurusan_list = ['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Manajemen Informatika', 'Sains Data'];

    for ($i = 0; $i < 100; $i++) {
        // Generate NIM 16 digit angka acak
        $nim = $faker->numerify('################');

        $nama = $faker->name;
        $jurusan = $faker->randomElement($jurusan_list);
        $angkatan = $faker->numberBetween(2020, 2023);

        // Email pribadi/alternatif untuk tabel mahasiswa
        $email_pribadi = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $nama)) . '@student.trunojoyo.ac.id';
        $alamat = $faker->address;

        // Eksekusi insert ke tabel mahasiswa
        $stmtMhs->execute([$nim, $nama, $jurusan, $angkatan, $email_pribadi, $alamat]);

        // Eksekusi insert ke tabel users (Format: NIM@student.trunojoyo.ac.id)
        $akun_kampus = $nim . '@student.trunojoyo.ac.id';
        $password_mhs = 'mahasiswa123'; // Password default untuk testing
        $stmtUser->execute([$akun_kampus, $nama, $password_mhs, 'mahasiswa']);
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

    // 5. Generate 5 Forum Diskusi
    echo "[-] Membuat data forum diskusi...\n";
    $stmtForum = $pdo->prepare("INSERT INTO forum (topik, isi, tanggal, penulis) VALUES (?, ?, ?, ?)");

    $topik_indo = [
        "Jadwal Praktikum Keamanan Jaringan",
        "Tanya seputar pengisian KRS Semester Ganjil",
        "Info Pendaftaran Beasiswa Kampus Merdeka",
        "Kehilangan Flasdisk di Lab Komputer",
        "Kelompok Tugas Akhir Rekayasa Perangkat Lunak"
    ];

    $isi_indo = [
        "<p>Permisi teman-teman, ada yang tau jadwal pengganti untuk kelas Pak Budi? Kemarin katanya diundur tapi saya belum dapat infonya di grup WhatsApp.</p>",
        "<p>Min, kok web SIAKAD loadingnya lama banget ya pas mau klik simpan KRS? Udah dicoba dari tadi malam gagal terus. Ada solusi?</p>",
        "<p>Bagi mahasiswa semester 5 yang berminat ikut program kampus merdeka, harap segera mengumpulkan berkas ke ruang TU paling lambat hari jumat.</p>",
        "<p>Tolong infonya kalau ada yang menemukan flashdisk Sandisk warna merah di Lab Komputer 2. Isinya file skripsi saya semua, belum di-backup :(</p>",
        "<p>Halo, saya butuh 1 orang lagi nih untuk kelompok tugas akhir mata kuliah RPL. Syaratnya bisa ngoding PHP/Laravel. Yang minat langsung reply ya!</p>"
    ];

    for ($i = 0; $i < 5; $i++) {
        $topik = $topik_indo[$i];
        $isi = $isi_indo[$i];
        // Tanggal diacak antara 1 bulan terakhir
        $tanggal = $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d');
        // Penulis diambil secara acak
        $penulis = $faker->name;

        $stmtForum->execute([$topik, $isi, $tanggal, $penulis]);
    }

    echo "\n=== SEEDING SELESAI! ===\n";
    echo "Database siakad_vuln_db siap digunakan untuk simulasi.\n";
    echo "------------------------------------------------------\n";
    echo "Info Login:\n";
    echo "Admin (SQLi Target) : admin' -- -\n";
    echo "Mahasiswa           : [nim_16_digit]@student.trunojoyo.ac.id\n";
    echo "Password Mahasiswa  : mahasiswa123\n";
    echo "------------------------------------------------------\n";
} catch (PDOException $e) {
    echo "Error saat seeding: " . $e->getMessage();
}
