<div class="flex items-center justify-center min-h-[65vh] py-8">
    <div class="w-full max-w-md bg-white p-8 md:p-10 rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-100">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Login Portal SIAKAD</h2>
            <p class="text-slate-500 text-sm mt-2">Silakan masukkan kredensial Anda.</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-6 border border-red-100 flex items-center gap-2 animate-pulse">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium"><?= $error ?></span>
            </div>
        <?php endif; ?>

        <form action="/login/process" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Username</label>
                <input type="text" name="username" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" placeholder="admin / nim mahasiswa" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <input type="password" name="password" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all" placeholder="••••••••">
            </div>
            <button type="submit" class="w-full bg-brand-600 text-white font-bold text-lg py-3 rounded-xl hover:bg-brand-700 hover:-translate-y-0.5 transition-all shadow-md shadow-brand-500/30 mt-2">
                Masuk ke Sistem
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-400 font-semibold tracking-wider uppercase mb-3">Panduan Lab Pengujian</p>
            <p class="text-sm text-slate-600">Simulasi SQLi Authentication Bypass. Coba masukkan payload ini di kolom Username (password biarkan kosong/asal):</p>
            <code class="block mt-2 bg-slate-100 border border-slate-200 text-pink-600 px-3 py-2 rounded-lg font-mono text-sm shadow-inner">admin' -- -</code>
        </div>
    </div>
</div>