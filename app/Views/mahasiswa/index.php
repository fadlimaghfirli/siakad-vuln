<div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-100">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Direktori Mahasiswa</h2>
            <p class="text-slate-500 text-sm mt-1">Total data ditampilkan: <?= count($mahasiswa) ?> Mahasiswa</p>
        </div>

        <form action="/mahasiswa" method="GET" class="w-full md:w-auto flex gap-2">
            <input type="text" name="q" value="<?= $keyword ?>" placeholder="Cari Nama atau NIM..."
                class="w-full md:w-64 border border-slate-300 rounded-xl px-4 py-2 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-all">
            <button type="submit" class="bg-brand-600 text-white px-5 py-2 rounded-xl hover:bg-brand-700 font-medium transition-colors shadow-sm">
                Cari
            </button>
        </form>
    </div>

    <?php if ($keyword != ''): ?>
        <div class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-xl text-blue-800">
            Hasil pencarian untuk: <span class="font-bold"><?= $keyword ?></span>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto rounded-xl border border-slate-200">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm">
                    <th class="p-4 font-semibold">NIM</th>
                    <th class="p-4 font-semibold">Nama Mahasiswa</th>
                    <th class="p-4 font-semibold">Jurusan</th>
                    <th class="p-4 font-semibold">Angkatan</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700">
                <?php if (empty($mahasiswa)): ?>
                    <tr>
                        <td colspan="4" class="p-8 text-center text-slate-500">Data mahasiswa tidak ditemukan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($mahasiswa as $row): ?>
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                            <td class="p-4 font-medium text-slate-900"><?= $row['nim'] ?></td>
                            <td class="p-4"><?= $row['nama'] ?></td>
                            <td class="p-4"><?= $row['jurusan'] ?></td>
                            <td class="p-4">
                                <span class="bg-slate-100 text-slate-600 px-2.5 py-1 rounded-md text-xs font-semibold">
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