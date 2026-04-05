</main>

<footer class="bg-white border-t border-slate-200 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start lg:item-center gap-4">
            <div class="text-center md:text-left">
                <a href="/home" class="flex items-center gap-3 group mb-2">
                    <!-- <div class="w-9 h-9 bg-gradient-to-br from-brand-500 to-brand-700 text-white rounded-full flex items-center justify-center font-bold text-sm shadow-md shadow-brand-500/30 group-hover:scale-105 transition-transform">S</div> -->
                    <img src="../../../public/img/logo_utm.png" alt="logo UTM" srcset="" width="24px">
                    <span class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-brand-800 to-brand-500 tracking-tight">SIAKAD</span>
                </a>
                <p class="text-sm text-slate-500 mt-1">
                    &copy; <?= date('Y') ?> Laboratorium Keamanan Web.
                </p>
            </div>
            <div class="text-center md:text-right">
                <p class="text-xs text-slate-400 bg-slate-100 px-3 py-1.5 rounded-full inline-block">
                    Dirancang khusus untuk pengujian Vulnerability Assessment.
                </p>
            </div>
        </div>
    </div>
</footer>

<div class="fixed md:bottom-12 md:left-12 bottom-6 left-6 z-50 flex flex-col items-start drop-shadow-2xl">

    <div id="vuln-warning-balloon" class="hidden mb-4 bg-white border border-red-200 shadow-xs rounded-2xl p-4 max-w-[250px] relative">
        <!-- <div id="vuln-warning-balloon" class="hidden mb-4 bg-white border border-red-200 shadow-xs rounded-2xl p-4 max-w-[250px] relative animate-bounce" style="animation: bounce 2s infinite; animation-timing-function: cubic-bezier(0.280, 0.840, 0.420, 1);"> -->

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
        const balloon = document.getElementById('vuln-warning-balloon');
        const closeBtn = document.getElementById('close-balloon-btn');

        // Cek apakah user sudah pernah menutup balon ini di sesi browser saat ini
        if (!sessionStorage.getItem('vulnBalloonDismissed')) {
            balloon.classList.remove('hidden'); // Tampilkan balon jika belum ditutup
        }

        // Aksi saat tombol X diklik
        closeBtn.addEventListener('click', () => {
            balloon.classList.add('hidden'); // Sembunyikan balon
            sessionStorage.setItem('vulnBalloonDismissed', 'true'); // Simpan ingatan di browser
        });
    });
</script>

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
</body>

</html>