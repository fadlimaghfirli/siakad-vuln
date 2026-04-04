<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'SIAKAD - Sistem Akademik' ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen selection:bg-brand-500 selection:text-white">

    <div class="bg-red-600/90 backdrop-blur-sm text-white text-center py-2 px-4 shadow-sm text-xs sm:text-sm font-medium z-50 sticky top-0">
        <span class="animate-pulse inline-block mr-1">⚠️</span>
        <span class="font-bold">SIMULASI VULN LAB:</span> Sistem ini sengaja dibuat rentan (XSS & SQLi) untuk keperluan penelitian akademis.
    </div>

    <nav class="bg-white border-b border-slate-200 shadow-sm sticky top-[36px] sm:top-[36px] z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/home" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-brand-600 text-white rounded-lg flex items-center justify-center font-bold text-xl shadow-md">S</div>
                        <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-brand-800 to-brand-500 tracking-tight">SIAKAD</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="/home" class="text-slate-600 hover:text-brand-600 hover:bg-brand-50 px-3 py-2 rounded-md font-medium transition-colors">Beranda</a>
                    <a href="/mahasiswa" class="text-slate-600 hover:text-brand-600 hover:bg-brand-50 px-3 py-2 rounded-md font-medium transition-colors">Mahasiswa</a>
                    <a href="/pengumuman" class="text-slate-600 hover:text-brand-600 hover:bg-brand-50 px-3 py-2 rounded-md font-medium transition-colors">Pengumuman</a>
                    <div class="pl-4">
                        <a href="/login" class="bg-brand-600 hover:bg-brand-700 text-white px-5 py-2 rounded-full font-medium transition-all shadow-md shadow-brand-500/30">Login Portal</a>
                    </div>
                </div>

                <div class="flex items-center md:hidden">
                    <button type="button" id="mobile-menu-btn" class="text-slate-500 hover:text-brand-600 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="md:hidden hidden bg-white border-t border-slate-100 absolute w-full" id="mobile-menu">
            <div class="px-4 pt-2 pb-4 space-y-1 shadow-lg rounded-b-2xl">
                <a href="/home" class="block text-slate-600 hover:bg-brand-50 hover:text-brand-600 px-3 py-2 rounded-md font-medium">Beranda</a>
                <a href="/mahasiswa" class="block text-slate-600 hover:bg-brand-50 hover:text-brand-600 px-3 py-2 rounded-md font-medium">Mahasiswa</a>
                <a href="/pengumuman" class="block text-slate-600 hover:bg-brand-50 hover:text-brand-600 px-3 py-2 rounded-md font-medium">Pengumuman</a>
                <a href="/login" class="block text-center mt-4 bg-brand-600 hover:bg-brand-700 text-white px-5 py-2 rounded-full font-medium shadow-md">Login Portal</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">