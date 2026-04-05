<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Login Portal - SIAKAD Vuln' ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#f8fafc] text-slate-800 flex items-center justify-center min-h-screen selection:bg-brand-500 selection:text-white p-4 md:p-8 relative z-0 overflow-x-hidden">

    <div class="absolute inset-0 -z-10 opacity-[0.03]" style="background-image: linear-gradient(#475569 1px, transparent 1px), linear-gradient(90deg, #475569 1px, transparent 1px); background-size: 32px 32px;"></div>
    <div class="absolute top-1/2 left-1/2 w-[40rem] h-[40rem] bg-brand-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-20 -z-10 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

    <div class="w-full max-w-5xl bg-white rounded-[2rem] md:rounded-[2.5rem] shadow-[0_20px_60px_rgb(0,0,0,0.05)] border border-slate-100 flex flex-col md:flex-row overflow-hidden relative z-10">

        <div class="hidden md:flex md:w-5/12 lg:w-1/2 bg-gradient-to-br from-brand-600 via-brand-700 to-slate-900 p-12 flex-col justify-between relative overflow-hidden text-white">

            <div class="absolute -top-32 -left-32 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-brand-400/20 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-50"></div>

            <div class="relative z-10">
                <!-- <div class="w-14 h-14 bg-white text-brand-700 rounded-2xl flex items-center justify-center font-extrabold text-3xl shadow-xl mb-8">S</div> -->
                <img src="../../../public/img/logo_utm.png" alt="" srcset="" width="60px" class="mb-8">
                <h2 class="text-3xl lg:text-4xl font-bold mb-4 leading-tight">Portal SIAKAD<br>Terintegrasi.</h2>
                <p class="text-brand-100 text-sm leading-relaxed max-w-sm">Kelola jadwal kuliah, nilai, dan data akademik Anda dalam satu platform yang aman dan responsif.</p>
            </div>

            <div class="relative z-10">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex items-center gap-4 shadow-lg">
                    <div class="w-10 h-10 bg-rose-500/20 text-rose-300 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-white uppercase tracking-wider">Target Eksploitasi</p>
                        <p class="text-[11px] text-brand-200 mt-0.5">Authentication Bypass (SQLi) Area</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-7/12 lg:w-1/2 p-8 md:p-12 lg:p-16 flex flex-col justify-center bg-white relative">

            <a href="/home" class="absolute top-6 left-6 md:top-8 md:left-8 lg:left-12 inline-flex items-center gap-2 text-sm font-semibold text-slate-400 hover:text-brand-600 transition-colors bg-slate-50 hover:bg-brand-50 px-4 py-2 rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Beranda</span>
            </a>

            <div class="md:hidden flex items-center gap-3 mt-16">
                <!-- <div class="w-10 h-10 bg-brand-600 text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-md">S</div> -->
                <img src="../../../public/img/logo_utm.png" alt="" srcset="" width="60px">
                <!-- <h2 class="text-2xl font-bold text-slate-800">Portal SIAKAD</h2> -->
            </div>

            <div class="mt-4 sm:mt-12 md:mt-8">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Masuk ke Akun</h2>
                <p class="text-slate-500 text-sm mb-8">Silakan masukkan kredensial Anda untuk melanjutkan.</p>

                <?php if (isset($error)): ?>
                    <div class="bg-red-50 text-red-600 p-4 rounded-2xl text-sm mb-8 border border-red-100 flex items-start gap-3 animate-pulse">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <span class="font-bold block">Otentikasi Gagal</span>
                            <span class="font-medium text-red-500/80"><?= $error ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="/login/process" method="POST" class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Akun Kampus</label>
                        <input type="text" name="username" class="w-full border border-slate-200 rounded-xl px-4 py-3.5 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all bg-slate-50 focus:bg-white text-slate-800 font-medium" placeholder="Masukkan akun kampus" required>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-semibold text-slate-700">Password</label>
                        </div>
                        <input type="password" name="password" class="w-full border border-slate-200 rounded-xl px-4 py-3.5 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all bg-slate-50 focus:bg-white text-slate-800 font-medium" placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full bg-brand-600 text-white font-bold text-lg py-3.5 rounded-xl hover:bg-brand-700 hover:-translate-y-0.5 transition-all shadow-lg shadow-brand-500/30 mt-4 flex justify-center items-center gap-2">
                        Masuk ke Sistem
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>

                <div class="mt-10 pt-8 border-t border-slate-100">
                    <p class="text-[11px] text-slate-400 font-bold tracking-widest uppercase mb-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-pink-500"></span>
                        Panduan Pengujian (Payload)
                    </p>

                    <div id="copy-payload-btn" class="bg-slate-900 rounded-xl p-4 flex items-center justify-between group cursor-pointer hover:bg-slate-800 transition-colors border border-slate-800">
                        <div>
                            <p class="flex flex-col text-[10px] text-slate-400 mb-1 font-medium">Bypass Query
                                <span>Isi kolom <strong>Akun Kampus</strong> dengan ini:</span>
                            </p>
                            <code class="text-pink-400 font-mono text-sm font-bold">admin' -- -</code>
                        </div>
                        <div id="copy-icon" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-slate-400 group-hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-2 text-center">Klik pada kotak hitam di atas untuk menyalin payload.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed md:bottom-12 md:left-12 bottom-6 left-6 z-50 flex flex-col items-start drop-shadow-2xl">
        <div id="vuln-warning-balloon" class="hidden mb-4 bg-white border border-red-200 shadow-xl rounded-2xl p-4 max-w-xs relative animate-bounce" style="animation: bounce 2s infinite; animation-timing-function: cubic-bezier(0.280, 0.840, 0.420, 1);">
            <button id="close-balloon-btn" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors focus:outline-none">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="flex items-start gap-3">
                <div class="bg-red-100 text-red-600 p-2 rounded-full flex-shrink-0 mt-0.5">
                    <span class="animate-pulse block" style="font-size: 1rem; line-height: 1;">⚠️</span>
                </div>
                <div class="pr-3">
                    <h4 class="text-xs font-bold text-red-600 uppercase tracking-wider mb-1">Simulasi Vuln Lab</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Sistem ini sengaja dibuat rentan. Klik tombol di bawah untuk panduan eksploitasi.</p>
                </div>
            </div>
            <div class="absolute -bottom-2 left-6 w-4 h-4 bg-white border-b border-r border-red-200 transform rotate-45"></div>
        </div>

        <a href="/panduan" class="bg-brand-600 hover:bg-brand-700 text-white w-14 h-14 rounded-full shadow-lg shadow-brand-500/40 flex items-center justify-center transition-all hover:-translate-y-1 group relative border-2 border-brand-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span class="absolute left-16 bg-slate-800 text-white text-xs px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-md pointer-events-none">
                Buka Panduan Lab
            </span>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Logika Balon Panduan
            const balloon = document.getElementById('vuln-warning-balloon');
            const closeBtn = document.getElementById('close-balloon-btn');

            if (!sessionStorage.getItem('vulnBalloonDismissed')) {
                balloon.classList.remove('hidden');
            }

            closeBtn.addEventListener('click', () => {
                balloon.classList.add('hidden');
                sessionStorage.setItem('vulnBalloonDismissed', 'true');
            });

            // 2. Logika Copy Payload (Support HTTP Lokal)
            const copyBtn = document.getElementById('copy-payload-btn');
            const copyIcon = document.getElementById('copy-icon');

            copyBtn.addEventListener('click', () => {
                const payload = "admin' -- -";

                // Fungsi Fallback Khusus untuk HTTP/Non-Secure context
                const fallbackCopy = (text) => {
                    const textArea = document.createElement("textarea");
                    textArea.value = text;
                    textArea.style.position = "fixed";
                    textArea.style.opacity = "0";
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    try {
                        document.execCommand('copy');
                    } catch (err) {}
                    document.body.removeChild(textArea);
                };

                // Coba gunakan API modern jika di HTTPS, jika gagal pakai fallback
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(payload);
                } else {
                    fallbackCopy(payload);
                }

                // Animasi UX: Ikon berubah jadi centang hijau
                const originalIcon = copyIcon.innerHTML;
                copyIcon.innerHTML = `<svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                copyIcon.classList.add('bg-emerald-500/20');
                copyIcon.classList.remove('bg-white/10');

                // Kembalikan ke ikon awal setelah 2 detik
                setTimeout(() => {
                    copyIcon.innerHTML = originalIcon;
                    copyIcon.classList.remove('bg-emerald-500/20');
                    copyIcon.classList.add('bg-white/10');
                }, 2000);
            });
        });
    </script>
</body>

</html>