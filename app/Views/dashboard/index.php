<?php $role = $_SESSION['role'] ?? 'mahasiswa'; ?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    <div class="lg:col-span-4 xl:col-span-3">
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden sticky top-28 transition-all hover:shadow-2xl hover:shadow-slate-200/50">

            <div class="h-32 relative overflow-hidden <?= $role === 'admin' ? 'bg-gradient-to-br from-slate-800 to-slate-900' : 'bg-gradient-to-br from-brand-500 via-brand-600 to-blue-700' ?>">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+')] opacity-50"></div>
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
            </div>

            <div class="px-6 pb-8 relative text-center">
                <div class="w-24 h-24 bg-white rounded-full p-1.5 mx-auto -mt-12 relative z-10 shadow-lg border border-slate-50">
                    <div class="w-full h-full <?= $role === 'admin' ? 'bg-slate-100 text-slate-800' : 'bg-brand-100 text-brand-600' ?> rounded-full flex items-center justify-center text-3xl font-extrabold uppercase">
                        <?= substr($_SESSION['username'], 0, 1) ?>
                    </div>
                    <div class="absolute bottom-1 right-1 w-5 h-5 bg-emerald-500 border-4 border-white rounded-full"></div>
                </div>

                <div class="mt-4 mb-6">
                    <h2 class="text-xl font-bold text-slate-900"><?= htmlspecialchars($_SESSION['username']) ?></h2>
                    <p class="text-sm font-semibold <?= $role === 'admin' ? 'text-slate-600' : 'text-brand-600' ?> uppercase tracking-wider mt-1"><?= htmlspecialchars($role) ?> SIAKAD</p>
                </div>

                <div class="bg-slate-50 rounded-2xl p-4 mb-6 border border-slate-100 text-left space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 font-medium">Status</span>
                        <span class="bg-emerald-100 text-emerald-700 px-2.5 py-0.5 rounded-full font-bold text-xs">Online</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 font-medium">Hak Akses</span>
                        <span class="text-slate-700 font-bold uppercase text-xs"><?= $role ?></span>
                    </div>
                </div>

                <a href="/login/logout" class="flex items-center justify-center gap-2 w-full bg-red-50 hover:bg-red-100 text-red-600 font-bold py-3 rounded-xl transition-all hover:shadow-md hover:shadow-red-500/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar Sistem
                </a>
            </div>
        </div>
    </div>

    <div class="lg:col-span-8 xl:col-span-9 space-y-8">

        <?php if ($role === 'admin'): ?>
            <div class="bg-slate-900 rounded-[2rem] p-8 md:p-10 text-white shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6 border border-slate-800">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-rose-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 pointer-events-none"></div>

                <div class="relative z-10 w-full md:w-2/3">
                    <span class="bg-rose-500/20 text-rose-300 border border-rose-500/30 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">Administrator Panel</span>
                    <h1 class="text-3xl md:text-4xl font-extrabold mb-3 leading-tight">System Control Panel</h1>
                    <p class="text-slate-400 font-medium leading-relaxed">Anda memiliki akses penuh untuk mengelola data mahasiswa, sistem akademik, dan memantau log keamanan server.</p>
                </div>

                <div class="relative z-10 w-full md:w-auto">
                    <a href="/mahasiswa" class="block w-full md:w-auto text-center bg-white hover:bg-slate-200 text-slate-900 font-bold py-3.5 px-6 rounded-xl transition-all shadow-lg hover:-translate-y-1">
                        Kelola Database
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Total Mahasiswa</h3>
                    <p class="text-3xl font-extrabold text-slate-900">10,482</p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg">Normal</span>
                    </div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Status Server</h3>
                    <p class="text-3xl font-extrabold text-slate-900">Uptime <span class="text-base text-slate-400">99.9%</span></p>
                </div>

                <div class="bg-rose-50 border border-rose-200 p-6 rounded-3xl shadow-sm hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-rose-600 bg-white px-2 py-1 rounded-lg border border-rose-100 shadow-sm animate-pulse">Vuln Alert!</span>
                    </div>
                    <h3 class="text-sm font-bold text-rose-800 uppercase tracking-wider mb-1">Log Keamanan</h3>
                    <p class="text-3xl font-extrabold text-rose-600">3 <span class="text-base font-medium">Anomali</span></p>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                <h3 class="text-xl font-bold text-slate-800 mb-6">Log Aktivitas Terbaru (Simulasi)</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Login Berhasil</p>
                                <p class="text-xs text-slate-500">Akun: admin | IP: 192.168.1.10</p>
                            </div>
                        </div>
                        <span class="text-xs text-slate-400 font-medium">Baru saja</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-rose-50 rounded-xl border border-rose-100">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></div>
                            <div>
                                <p class="text-sm font-bold text-rose-700">Peringatan: Potensi SQL Injection</p>
                                <p class="text-xs text-rose-500/80">Kueri mencurigakan terdeteksi pada form login. Payload: <code class="bg-rose-100 px-1 rounded text-rose-800">admin' -- -</code></p>
                            </div>
                        </div>
                        <span class="text-xs text-rose-400 font-medium">2 Menit lalu</span>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="bg-brand-600 rounded-[2rem] p-8 md:p-10 text-white shadow-2xl shadow-brand-500/20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>

                <div class="relative z-10 w-full md:w-2/3">
                    <span class="bg-white/10 text-brand-100 border border-white/20 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">Dashboard Mahasiswa</span>
                    <h1 class="text-3xl md:text-4xl font-extrabold mb-3 leading-tight">Selamat Datang,<br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-200 to-white"><?= htmlspecialchars($_SESSION['username']) ?>!</span></h1>
                    <p class="text-brand-100 font-medium leading-relaxed">Pantau aktivitas akademik Anda, kelola rencana studi, dan dapatkan informasi terbaru seputar kampus.</p>
                </div>

                <div class="relative z-10 w-full md:w-auto">
                    <a href="/forum" class="block w-full md:w-auto text-center bg-white hover:bg-slate-100 text-brand-600 font-bold py-3.5 px-6 rounded-xl transition-all shadow-lg hover:-translate-y-1">
                        Buka Forum Diskusi
                    </a>
                </div>
            </div>

            <h3 class="text-xl font-bold text-slate-800 ml-2 mb-4">Ringkasan Akademik</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-brand-500/5 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg">+2 SKS</span>
                    </div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">SKS Ditempuh</h3>
                    <p class="text-3xl font-extrabold text-slate-900">104 <span class="text-base text-slate-400 font-medium tracking-normal">/ 144</span></p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-emerald-500/5 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg">Cum Laude</span>
                    </div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">IPK Saat Ini</h3>
                    <p class="text-3xl font-extrabold text-slate-900">3.85</p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-purple-500/5 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-lg">Terbaca</span>
                    </div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Pesan Masuk</h3>
                    <p class="text-3xl font-extrabold text-slate-900">0 <span class="text-base text-slate-400 font-medium tracking-normal">Pesan</span></p>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-slate-800">Jadwal Kuliah Hari Ini</h3>
                    <a href="#" class="text-sm font-bold text-brand-600 hover:text-brand-800 transition-colors">Lihat Semua KRS</a>
                </div>
                <div class="space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-brand-300 transition-colors">
                        <div class="bg-white border border-slate-200 text-center px-4 py-2 rounded-xl min-w-[5rem] shadow-sm">
                            <p class="text-xs text-slate-500 font-bold uppercase">Senin</p>
                            <p class="text-lg font-extrabold text-brand-600">08:00</p>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-bold text-slate-800 text-lg">Keamanan Sistem Lanjut</h4>
                            <p class="text-sm text-slate-500 font-medium">Ruang Lab Siber 3.2 • Dosen: Dr. Budi Setiawan</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>