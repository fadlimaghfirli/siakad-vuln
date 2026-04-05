<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-1">
        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-100 sticky top-24">
            <h3 class="text-xl font-bold text-slate-800 mb-2">Buat Diskusi Baru</h3>
            <p class="text-sm text-slate-500 mb-6">Tambahkan diskusi baru pada forum diskusi bersama..</p>

            <form action="/forum/simpan" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Diskusi</label>
                    <input type="text" name="judul" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Penulis</label>
                    <input type="text" name="penulis" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 bg-slate-50 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Isi Diskusi</label>
                    <textarea name="isi" rows="5" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20" placeholder="Tuliskan isi diskusi di sini..." required></textarea>
                </div>
                <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-semibold py-3 rounded-xl transition-colors shadow-sm mt-2">
                    Posting Diskusi
                </button>
            </form>

            <div class="mt-6 p-4 bg-orange-50 rounded-xl border border-orange-100">
                <p class="text-xs text-orange-800 font-medium">💡 <b>Lab Tip:</b> Coba masukkan script XSS ke dalam kolom "Isi Diskusi" untuk melakukan Stored XSS.</p>
            </div>
        </div>
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