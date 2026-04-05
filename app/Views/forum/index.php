<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-1">
        <?php if (isset($_SESSION['username'])): ?>
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-100 sticky top-28">
                <h3 class="text-xl font-bold text-slate-800 mb-2">Buat Diskusi Baru</h3>
                <p class="text-sm text-slate-500 mb-6">Bagikan informasi atau pertanyaan ke forum kampus.</p>

                <form action="/forum/simpan" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Topik Diskusi</label>
                        <input type="text" name="topik" class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all bg-slate-50 focus:bg-white text-slate-800 font-medium" required autocomplete="off">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Isi Pesan</label>
                        <textarea name="isi" rows="4" class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all bg-slate-50 focus:bg-white text-slate-800 font-medium" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-brand-500/30 transition-all hover:-translate-y-0.5 mt-2 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Posting ke Forum
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <p class="text-[11px] text-slate-400 font-bold tracking-widest uppercase mb-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Panduan Pengujian (Stored XSS)
                    </p>

                    <div id="copy-xss-btn" class="bg-slate-900 rounded-xl p-4 flex items-center justify-between group cursor-pointer hover:bg-slate-800 transition-colors border border-slate-800">
                        <div>
                            <p class="text-[10px] text-slate-400 mb-1 font-medium">Payload (Masukkan di Isi Pesan):</p>
                            <code class="text-amber-400 font-mono text-sm font-bold">&lt;script&gt;alert(Website berhasil di exploitasi!)&lt;/script&gt;</code>
                        </div>
                        <div id="copy-xss-icon" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-slate-400 group-hover:text-white transition-all flex-shrink-0 ml-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500 mt-2 text-center">Klik pada kotak hitam di atas untuk menyalin payload.</p>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const copyBtn = document.getElementById('copy-xss-btn');
                    const copyIcon = document.getElementById('copy-xss-icon');

                    if (copyBtn) {
                        copyBtn.addEventListener('click', () => {
                            // PAYLOAD SEVERE: Defacement Layar Penuh + Menampilkan Cookie
                            // Catatan: Tag script dipisah menjadi "scr" + "ipt" agar tidak merusak HTML parser
                            const payload = "<scr" + "ipt>alert('Website berhasil di exploitasi!')</scr" + "ipt>";

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
                    }
                });
            </script>

        <?php else: ?>
            <div class="bg-brand-50 p-8 rounded-3xl border border-brand-100 text-center sticky top-28">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg class="w-8 h-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Ingin Bergabung?</h3>
                <p class="text-sm text-slate-600 mb-6">Silakan login terlebih dahulu untuk dapat memulai topik diskusi baru di forum kampus.</p>
                <a href="/login" class="inline-block bg-brand-600 hover:bg-brand-700 text-white px-6 py-3 rounded-full font-bold text-sm shadow-md transition-all hover:-translate-y-0.5">Login ke Portal</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="lg:col-span-2 space-y-6">
        <h2 class="text-2xl font-bold text-slate-800">Papan Informasi Kampus</h2>

        <?php if (empty($forum)): ?>
            <div class="bg-white p-10 rounded-3xl border border-slate-100 text-center">
                <p class="text-slate-500">Belum ada diskusi saat ini.</p>
            </div>
        <?php else: ?>
            <?php foreach ($forum as $f): ?>
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">

                    <h4 class="text-xl font-bold text-slate-900 mb-2"><?= $f['topik'] ?></h4>

                    <div class="flex items-center gap-2 text-xs text-slate-500 mb-4 pb-4 border-b border-slate-100">
                        <span class="bg-brand-50 text-brand-700 px-2.5 py-1 rounded-md font-semibold"><?= htmlspecialchars($f['penulis']) ?></span>
                        <span>•</span>
                        <span><?= date('d M Y', strtotime($f['tanggal'])) ?></span>
                    </div>

                    <div class="text-slate-700 leading-relaxed max-w-none break-words">
                        <?= $f['isi'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>