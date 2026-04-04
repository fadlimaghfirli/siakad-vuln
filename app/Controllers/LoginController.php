<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            header("Location: /dashboard");
            exit;
        }

        $data = ['title' => 'Login Portal - SIAKAD Vuln'];
        $this->view('layouts/header', $data);
        $this->view('auth/login', $data);
        $this->view('layouts/footer');
    }

    public function process()
    {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $userModel = new UserModel();
        $user = $userModel->login($username, $password);

        if ($user) {
            // Login Berhasil, set Session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: /dashboard");
            exit;
        } else {
            // Login Gagal
            $data = [
                'title' => 'Login Portal - SIAKAD Vuln',
                'error' => 'Username atau Password salah!'
            ];
            $this->view('layouts/header', $data);
            $this->view('auth/login', $data);
            $this->view('layouts/footer');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
    }
}
