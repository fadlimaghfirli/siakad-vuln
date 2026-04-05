<div class="relative bg-white rounded-[2.5rem] shadow-[0_10px_40px_rgb(0,0,0,0.03)] border border-slate-100 overflow-hidden mb-12">

    <div class="absolute inset-0 -z-10 opacity-[0.03]" style="background-image: linear-gradient(#475569 1px, transparent 1px), linear-gradient(90deg, #475569 1px, transparent 1px); background-size: 32px 32px;"></div>
    <div class="absolute top-0 right-0 w-[40rem] h-[40rem] bg-brand-50 rounded-full mix-blend-multiply filter blur-3xl opacity-60 -z-10 translate-x-1/2 -translate-y-1/2"></div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center p-8 md:p-16 lg:p-20">

        <div class="lg:col-span-7 text-left space-y-8">
            <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-brand-50 border border-brand-100 text-sm font-semibold text-brand-700 shadow-inner">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                </span>
                Tahun Ajaran 2025/2026 - Semester Genap Aktif
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tighter leading-[1.1]">
                Satu Platform,<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-blue-500">Ribuan Kemudahan</span><br>
                Akademik Anda.
            </h1>

            <p class="text-lg md:text-xl text-slate-600 max-w-2xl leading-relaxed font-medium">
                Selamat datang di SIAKAD, Portal Akademik Terpadu. Kelola Jadwal, KRS, Nilai, dan Administrasi Kampus dalam satu genggaman yang cerdas dan terintegrasi.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="/dashboard" class="group bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 flex items-center justify-center gap-2.5">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Masuk Dashboard Saya
                    </a>
                <?php else: ?>
                    <a href="/login" class="group bg-brand-600 hover:bg-brand-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all shadow-lg shadow-brand-500/30 hover:-translate-y-1 flex items-center justify-center gap-2.5">
                        <svg class="w-5 h-5 text-brand-200 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3 3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk Portal SIAKAD
                    </a>
                <?php endif; ?>

                <a href="/forum" class="group bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 px-8 py-4 rounded-xl font-semibold text-lg transition-all shadow-sm hover:border-slate-300 flex items-center justify-center gap-2.5">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                    Lihat Forum Diskusi
                </a>
            </div>
        </div>

        <div class="lg:col-span-5 hidden lg:block relative p-5">
            <div class="absolute inset-0 bg-brand-100 rounded-full scale-110 filter blur-2xl opacity-50"></div>

            <div class="relative space-y-4 transform rotate-[-2deg]">

                <div class="bg-white p-5 rounded-2xl shadow-xl border border-slate-100 transform transition-all hover:rotate-0 hover:scale-105 cursor-default">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-bold text-slate-900">Jadwal Hari Ini</h4>
                        <span class="text-xs text-brand-600 font-semibold bg-brand-50 px-2.5 py-1 rounded-full">Senin</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="w-10 h-10 bg-brand-500 text-white rounded-lg flex items-center justify-center font-bold text-xs flex-shrink-0">08:00</div>
                            <div>
                                <p class="text-sm font-semibold text-slate-800">Sistem Keamanan Jaringan</p>
                                <p class="text-xs text-slate-500">RKB-D 207</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="w-10 h-10 bg-slate-200 text-slate-600 rounded-lg flex items-center justify-center font-bold text-xs flex-shrink-0">10:30</div>
                            <div>
                                <p class="text-sm font-semibold text-slate-800">Rekayasa Perangkat Lunak</p>
                                <p class="text-xs text-slate-500">RKB-D 208</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute -right-10 top-1/2 bg-emerald-500 text-white p-4 rounded-xl shadow-2xl shadow-emerald-500/30 transform rotate-[10deg] border-2 border-white transition-all hover:rotate-0 hover:-translate-y-2 cursor-default">
                    <p class="text-xs font-medium opacity-80">IPK Terakhir</p>
                    <p class="text-3xl font-extrabold">3.85</p>
                    <svg class="w-6 h-6 absolute -bottom-2 -left-2 text-emerald-200" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l2.4 7.2h7.6l-6 4.8 2.4 7.2-6-4.8-6 4.8 2.4-7.2-6-4.8h7.6z" />
                    </svg>
                </div>

                <div class="absolute -left-10 -bottom-5 bg-white p-4 rounded-xl shadow-xl border border-slate-100 transform rotate-[-5deg] flex items-center gap-3 transition-all hover:rotate-0 cursor-default">
                    <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-900">KRS Disetujui</p>
                        <p class="text-xs text-emerald-600 font-medium">24 SKS Aktif</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="bg-gradient-to-br from-brand-800 to-brand-600 rounded-[2rem] p-8 md:p-12 shadow-xl shadow-brand-500/20 mb-12 text-white overflow-hidden relative">
    <div class="absolute -right-20 -top-20 w-64 h-64 border-4 border-white/10 rounded-full"></div>
    <div class="absolute right-20 -bottom-20 w-40 h-40 border-4 border-white/10 rounded-full"></div>

    <div class="relative z-10 grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/20">
        <div>
            <h4 class="text-4xl md:text-5xl font-extrabold mb-2">10K+</h4>
            <p class="text-brand-100 font-medium text-sm md:text-base">Mahasiswa Aktif</p>
        </div>
        <div>
            <h4 class="text-4xl md:text-5xl font-extrabold mb-2">45</h4>
            <p class="text-brand-100 font-medium text-sm md:text-base">Program Studi</p>
        </div>
        <div>
            <h4 class="text-4xl md:text-5xl font-extrabold mb-2">500+</h4>
            <p class="text-brand-100 font-medium text-sm md:text-base">Dosen Pengajar</p>
        </div>
        <div class="border-transparent md:border-white/20">
            <h4 class="text-4xl md:text-5xl font-extrabold mb-2">24/7</h4>
            <p class="text-brand-100 font-medium text-sm md:text-base">Layanan Akademik</p>
        </div>
    </div>
</div>

<div class="mb-16">
    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-8 text-center">Fasilitas Sistem Utama</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgb(0,0,0,0.02)] border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-14 h-14 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-600 group-hover:text-white transition-colors duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-3">Data Terpusat</h3>
            <p class="text-slate-600 leading-relaxed">Manajemen data mahasiswa, dosen, dan staf administrasi yang terintegrasi penuh dalam satu basis data yang aman dan cepat.</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgb(0,0,0,0.02)] border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-3">KRS Online</h3>
            <p class="text-slate-600 leading-relaxed">Kemudahan penyusunan Rencana Studi secara mandiri dari mana saja, dilengkapi dengan validasi otomatis oleh Dosen Pembimbing.</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgb(0,0,0,0.02)] border border-slate-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-3">Forum Interaktif</h3>
            <p class="text-slate-600 leading-relaxed">Wadah diskusi interaktif dan papan pengumuman real-time untuk memperlancar komunikasi seluruh civitas akademika.</p>
        </div>
    </div>
</div>

<div>
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Portal Layanan Lainnya</h2>
        <a href="#" class="hidden sm:flex text-brand-600 hover:text-brand-800 font-semibold items-center gap-1 transition-colors">
            Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="https://journal.trunojoyo.ac.id/" target="_blank" class="flex items-center gap-4 p-5 bg-white rounded-2xl border border-slate-100 hover:border-brand-300 hover:shadow-md transition-all group">
            <div class="w-12 h-12 bg-slate-50 group-hover:bg-brand-50 text-slate-600 group-hover:text-brand-600 rounded-xl flex items-center justify-center transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 group-hover:text-brand-600 transition-colors">E-Journal</h4>
                <p class="text-xs text-slate-500 mt-0.5">Jurnal Kampus</p>
            </div>
        </a>

        <a href="https://library.trunojoyo.ac.id/elib/index.php" target="_blank" class="flex items-center gap-4 p-5 bg-white rounded-2xl border border-slate-100 hover:border-brand-300 hover:shadow-md transition-all group">
            <div class="w-12 h-12 bg-slate-50 group-hover:bg-brand-50 text-slate-600 group-hover:text-brand-600 rounded-xl flex items-center justify-center transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 group-hover:text-brand-600 transition-colors">E-Library</h4>
                <p class="text-xs text-slate-500 mt-0.5">Buku Digital</p>
            </div>
        </a>

        <a href="https://pusatbahasa.trunojoyo.ac.id/" target="_blank" class="flex items-center gap-4 p-5 bg-white rounded-2xl border border-slate-100 hover:border-brand-300 hover:shadow-md transition-all group">
            <div class="w-12 h-12 bg-slate-50 group-hover:bg-brand-50 text-slate-600 group-hover:text-brand-600 rounded-xl flex items-center justify-center transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 group-hover:text-brand-600 transition-colors">Pusat Bahasa</h4>
                <p class="text-xs text-slate-500 mt-0.5">UPT Pusat Bahasa</p>
            </div>
        </a>
    </div>
</div>