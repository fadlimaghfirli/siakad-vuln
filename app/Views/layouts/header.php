<?php
// Logika untuk menentukan menu mana yang sedang aktif
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$isHome  = ($current_uri == '/' || strpos($current_uri, '/home') === 0);
$isMhs   = (strpos($current_uri, '/mahasiswa') === 0);
$isForum = (strpos($current_uri, '/forum') === 0);

// Style Modern Minimalis (Gaya Tab Switcher dengan aksen Biru)
$deskBase     = "px-4 py-2 text-sm font-semibold transition-all duration-300 rounded-full ";
$deskActive   = $deskBase . "bg-white text-brand-600 shadow-sm ring-1 ring-brand-500/10"; // Teks tab aktif berwarna biru
$deskInactive = $deskBase . "text-slate-500 hover:text-brand-600 hover:bg-brand-50/50";

// Style Modern untuk Mobile (Aksen Biru)
$mobBase      = "block px-4 py-3 rounded-2xl transition-all duration-200 text-sm font-semibold ";
$mobActive    = $mobBase . "bg-brand-600 text-white shadow-md shadow-brand-500/20"; // Background menu aktif biru
$mobInactive  = $mobBase . "text-slate-500 hover:bg-brand-50 hover:text-brand-600";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'SIAKAD - Sistem Akademik' ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#f8fafc] text-slate-800 flex flex-col min-h-screen selection:bg-brand-500 selection:text-white">

    <div class="sticky top-6 z-40 px-4 sm:px-6 w-full max-w-7xl mx-auto transition-all duration-300">

        <nav class="bg-white/50 backdrop-blur-lg border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-full px-4 py-2.5 flex items-center justify-between">

            <a href="/home" class="flex items-center gap-3 pl-2 group">
                <!-- <div class="w-9 h-9 bg-gradient-to-br from-brand-500 to-brand-700 text-white rounded-full flex items-center justify-center font-bold text-sm shadow-md shadow-brand-500/30 group-hover:scale-105 transition-transform">S</div> -->
                <img src="../../../public/img/logo_utm.png" alt="logo UTM" srcset="" width="24px">
                <span class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-brand-800 to-brand-500 tracking-tight">SIAKAD</span>
            </a>

            <div class="hidden md:flex items-center bg-slate-50/80 p-1 rounded-full border border-slate-100">
                <a href="/home" class="<?= $isHome ? $deskActive : $deskInactive ?>">Beranda</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="/mahasiswa" class="<?= $isMhs ? $deskActive : $deskInactive ?>">Mahasiswa</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'mahasiswa'): ?>
                    <a href="#" class="<?= $isKRS ? $deskActive : $deskInactive ?>">KRS</a>
                    <a href="#" class="<?= $isKHS ? $deskActive : $deskInactive ?>">KHS</a>
                    <a href="#" class="<?= $isTN ? $deskActive : $deskInactive ?>">Transkrip Nilai</a>
                <?php endif; ?>
                <a href="/forum" class="<?= $isForum ? $deskActive : $deskInactive ?>">Forum Diskusi</a>
            </div>

            <div class="hidden md:flex items-center pr-1 gap-2">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="/dashboard" class="text-sm font-semibold text-brand-600 hover:text-brand-800 px-4 py-2 transition-colors">
                        Dashboard
                    </a>
                    <a href="/login/logout" class="text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-700 px-6 py-2.5 rounded-full transition-all hover:shadow-sm">
                        Keluar
                    </a>
                <?php else: ?>
                    <a href="/login" class="text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 px-6 py-2.5 rounded-full transition-all hover:shadow-lg hover:shadow-brand-500/30 hover:-translate-y-0.5">
                        Login Portal
                    </a>
                <?php endif; ?>
            </div>

            <button id="mobile-menu-btn" class="md:hidden w-10 h-10 flex items-center justify-center rounded-full bg-white border border-slate-200 text-brand-600 hover:bg-brand-50 hover:border-brand-200 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-100">
                <svg id="menu-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <div id="mobile-menu" class="hidden absolute top-full left-4 right-4 mt-3 bg-white/95 backdrop-blur-xl border border-slate-100 shadow-2xl rounded-3xl p-3 origin-top transition-all md:hidden">
            <div class="space-y-1">
                <a href="/home" class="<?= $isHome ? $mobActive : $mobInactive ?>">Beranda</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="/mahasiswa" class="<?= $isMhs ? $mobActive : $mobInactive ?>">Mahasiswa</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'mahasiswa'): ?>
                    <a href="#" class="<?= $isKRS ? $mobActive : $mobInactive ?>">KRS</a>
                    <a href="#" class="<?= $isKHS ? $mobActive : $mobInactive ?>">KHS</a>
                    <a href="#" class="<?= $isTN ? $mobActive : $mobInactive ?>">Transkrip Nilai</a>
                <?php endif; ?>
                <a href="/forum" class="<?= $isForum ? $mobActive : $mobInactive ?>">Forum Diskusi</a>
            </div>

            <div class="mt-4 pt-4 border-t border-slate-100 space-y-2">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="/dashboard" class="block w-full text-center bg-brand-50 text-brand-700 hover:bg-brand-100 font-bold px-4 py-3.5 rounded-2xl transition-colors border border-brand-100">Dashboard Saya</a>
                    <a href="/login/logout" class="block w-full text-center bg-red-50 text-red-600 hover:bg-red-100 font-semibold px-4 py-3.5 rounded-2xl transition-colors">Keluar Sistem</a>
                <?php else: ?>
                    <a href="/login" class="block w-full text-center bg-brand-600 text-white hover:bg-brand-700 font-semibold px-4 py-3.5 rounded-2xl shadow-lg shadow-brand-500/30 transition-all">Login Portal</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('menu-icon-open');
        const iconClose = document.getElementById('menu-icon-close');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });
    </script>

    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">