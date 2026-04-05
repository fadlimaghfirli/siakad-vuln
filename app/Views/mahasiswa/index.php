<div class="space-y-6">
    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-xl shadow-slate-200/40 border border-slate-100 relative overflow-hidden">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-brand-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 pointer-events-none"></div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative z-10">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-brand-100 text-brand-600 rounded-2xl flex items-center justify-center shadow-inner">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900">Direktori Mahasiswa</h2>
                    <p class="text-slate-500 text-sm mt-0.5 font-medium">Sistem Informasi Akademik Terpadu</p>
                </div>
            </div>

            <form action="/mahasiswa" method="GET" class="w-full md:w-auto relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-brand-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="q" value="<?= $keyword ?>" placeholder="Cari Nama atau NIM..."
                    class="w-full md:w-80 pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all text-sm font-medium text-slate-800 placeholder-slate-400 shadow-sm">
                <button type="submit" class="absolute inset-y-1.5 right-1.5 bg-brand-600 hover:bg-brand-700 text-white px-4 rounded-lg font-semibold text-sm transition-all shadow-md">
                    Cari Data
                </button>
            </form>
        </div>
    </div>

    <?php if ($keyword != ''): ?>
        <div class="bg-blue-50 border border-blue-200 p-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-blue-800">Menampilkan hasil pencarian untuk: <span class="font-bold text-blue-900 bg-blue-200/50 px-2 py-0.5 rounded"><?= $keyword ?></span></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($sql_error)): ?>
        <div class="bg-slate-900 border border-rose-900/50 p-5 rounded-2xl shadow-2xl relative overflow-hidden animate-pulse-slow">
            <div class="absolute top-0 left-0 w-1 h-full bg-rose-500"></div>
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-rose-500 font-bold text-sm tracking-wider uppercase">Database Syntax Error</h3>
            </div>
            <div class="bg-black/50 p-4 rounded-xl border border-rose-500/20 overflow-x-auto">
                <code class="text-rose-400 font-mono text-xs whitespace-pre-wrap"><?= htmlspecialchars($sql_error) ?></code>
            </div>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <h3 class="font-bold text-slate-800">Daftar Mahasiswa Aktif</h3>
            <span class="bg-slate-200 text-slate-600 px-3 py-1 rounded-full text-xs font-bold"><?= count($mahasiswa) ?> Data</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-white border-b border-slate-100 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-bold">Mahasiswa</th>
                        <th class="px-6 py-4 font-bold">NIM</th>
                        <th class="px-6 py-4 font-bold">Program Studi</th>
                        <th class="px-6 py-4 font-bold text-center">Angkatan</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700 divide-y divide-slate-50">
                    <?php if (empty($mahasiswa)): ?>
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <span class="font-medium">Tidak ada data mahasiswa yang ditemukan.</span>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($mahasiswa as $row): ?>
                            <tr class="hover:bg-brand-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-100 to-blue-100 text-brand-600 flex items-center justify-center font-bold text-sm shadow-inner group-hover:scale-110 transition-transform">
                                            <?= substr($row['nama'], 0, 1) ?>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-800"><?= $row['nama'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <code class="text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md font-mono text-xs border border-slate-200"><?= $row['nim'] ?></code>
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-600"><?= $row['jurusan'] ?></td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-600 border border-emerald-100 px-3 py-1 rounded-lg text-xs font-bold shadow-sm">
                                        <?= $row['angkatan'] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-xl shadow-slate-200/40 border border-slate-100 mt-8">
        <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
            </svg>
            Panduan Lab Pengujian
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border border-slate-200 rounded-2xl overflow-hidden">
                <div class="bg-slate-50 px-4 py-3 border-b border-slate-200 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span>
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Reflected XSS</span>
                </div>
                <div id="copy-xss-btn" class="bg-slate-900 p-4 flex items-center justify-between group cursor-pointer hover:bg-slate-800 transition-colors">
                    <div>
                        <p class="text-[10px] text-slate-400 mb-1 font-medium">Tempel payload ini di form pencarian:</p>
                        <code class="text-amber-400 font-mono text-sm font-bold">&lt;script&gt;alert(document.cookie)&lt;/script&gt;</code>
                    </div>
                    <div id="copy-xss-icon" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-slate-400 group-hover:text-white transition-all flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="border border-slate-200 rounded-2xl overflow-hidden">
                <div class="bg-slate-50 px-4 py-3 border-b border-slate-200 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-pink-500 animate-pulse"></span>
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Error-Based SQLi</span>
                </div>
                <div id="copy-sqli-btn" class="bg-slate-900 p-4 flex items-center justify-between group cursor-pointer hover:bg-slate-800 transition-colors">
                    <div>
                        <p class="text-[10px] text-slate-400 mb-1 font-medium">Tempel untuk memicu Database Error:</p>
                        <code class="text-pink-400 font-mono text-sm font-bold">' OR 1=1 -- -</code>
                    </div>
                    <div id="copy-sqli-icon" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-slate-400 group-hover:text-white transition-all flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const setupCopy = (btnId, iconId, textToCopy) => {
            const btn = document.getElementById(btnId);
            const icon = document.getElementById(iconId);

            if (btn && icon) {
                btn.addEventListener('click', () => {
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

                    if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(textToCopy);
                    } else {
                        fallbackCopy(textToCopy);
                    }

                    const originalIcon = icon.innerHTML;
                    icon.innerHTML = `<svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>`;
                    icon.classList.add('bg-emerald-500/20');
                    icon.classList.remove('bg-white/10');

                    setTimeout(() => {
                        icon.innerHTML = originalIcon;
                        icon.classList.remove('bg-emerald-500/20');
                        icon.classList.add('bg-white/10');
                    }, 2000);
                });
            }
        };

        // Pisahkan tag script agar tidak merusak HTML saat dirender
        setupCopy('copy-xss-btn', 'copy-xss-icon', "<scr" + "ipt>alert('Reflected XSS Berhasil! Cookie: ' + document.cookie)</scr" + "ipt>");
        setupCopy('copy-sqli-btn', 'copy-sqli-icon', "' OR 1=1 -- -");
    });
</script>