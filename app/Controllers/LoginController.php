<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            header("Location: /dashboard");
            exit;
        }

        $data = ['title' => 'Login Portal - SIAKAD Vuln'];

        // HANYA memanggil view login (tanpa header & footer)
        $this->view('auth/login', $data);
    }

    public function process()
    {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $userModel = new UserModel();
        $user = $userModel->login($username, $password);

        if ($user) {
            // session_start() juga dihapus dari sini
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Tampilkan SweetAlert
            $this->view('layouts/header', ['title' => 'Login Berhasil']);
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Login!',
                        text: 'Selamat datang, " . htmlspecialchars($user['username']) . "',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '/dashboard';
                    });
                });
            </script>";
            $this->view('layouts/footer');
            exit;
        } else {
            // Login Gagal
            $data = [
                'title' => 'Login Portal - SIAKAD Vuln',
                'error' => 'Username atau Password salah!'
            ];

            $this->view('auth/login', $data);
        }
    }

    public function logout()
    {
        // Hapus semua data session dan hancurkan session
        session_unset();
        session_destroy();
        header("Location: /home");
        exit;
    }
}
