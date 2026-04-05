<div class="max-w-4xl mx-auto">
    <div class="bg-slate-900 text-white rounded-3xl p-8 md:p-12 mb-8 shadow-xl relative overflow-hidden">
        <div class="relative z-10">
            <span class="bg-brand-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">Edukasi Keamanan Web</span>
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Dokumentasi Vuln Lab</h1>
            <p class="text-slate-300 text-lg leading-relaxed max-w-2xl">Panduan komprehensif untuk memahami, mengeksploitasi, dan menambal kerentanan SQL Injection dan Cross-Site Scripting (XSS) pada sistem simulasi ini.</p>
        </div>
        <div class="absolute -right-10 -bottom-10 opacity-10">
            <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden mb-8">
        <div class="bg-rose-50 border-b border-rose-100 p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center font-bold text-xl shadow-inner">SQLi</div>
            <h2 class="text-2xl font-bold text-slate-800">1. SQL Injection (SQLi)</h2>
        </div>

        <div class="p-6 md:p-8 space-y-8">
            <div>
                <h3 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg> Konsep Dasar
                </h3>
                <p class="text-slate-600 mb-4 leading-relaxed">SQL Injection terjadi ketika input dari pengguna yang tidak divalidasi/disanitasi digabungkan secara langsung ke dalam kueri database. Hal ini memungkinkan penyerang untuk memanipulasi kueri tersebut untuk membypass otentikasi atau mencuri data.</p>

            </div>

            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                <h3 class="text-lg font-bold text-rose-600 mb-3">⚔️ Skenario Serangan (Eksploitasi)</h3>

                <div class="mb-5">
                    <h4 class="font-bold text-slate-700 mb-1">A. Authentication Bypass (Halaman Login)</h4>
                    <p class="text-sm text-slate-600 mb-2">Penyerang dapat masuk sebagai Admin tanpa mengetahui password dengan membuat kueri password diabaikan (dikomentari).</p>
                    <ul class="list-disc list-inside text-sm text-slate-600 space-y-1 mb-3">
                        <li>Buka halaman <code>/login</code></li>
                        <li>Masukkan payload berikut pada kolom Username: <code class="bg-rose-100 text-rose-700 px-1.5 py-0.5 rounded">admin' -- -</code></li>
                        <li>Isi password sembarang, lalu klik Masuk.</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-slate-700 mb-1">B. Error-Based Extraction (Halaman Mahasiswa)</h4>
                    <p class="text-sm text-slate-600 mb-2">Karena error database ditampilkan, penyerang (atau tools seperti SQLMap) dapat membaca struktur database.</p>
                    <ul class="list-disc list-inside text-sm text-slate-600 space-y-1">
                        <li>Pastikan Anda sudah login, lalu buka halaman <code>/mahasiswa</code></li>
                        <li>Tambahkan tanda kutip tunggal <code class="bg-rose-100 text-rose-700 px-1.5 py-0.5 rounded">'</code> di form pencarian untuk memicu Syntax Error.</li>
                        <li>Untuk SQLMap, jalankan: <code class="bg-slate-800 text-green-400 px-2 py-1 rounded block mt-2 text-xs font-mono">sqlmap -u "http://siakad-vuln.test/mahasiswa?q=1*" --dbs --batch</code></li>
                    </ul>
                </div>
            </div>

            <div class="bg-emerald-50 p-6 rounded-2xl border border-emerald-100">
                <h3 class="text-lg font-bold text-emerald-700 mb-3">🛡️ Solusi Keamanan (Mitigasi)</h3>
                <p class="text-sm text-slate-600 mb-3">Cara mutlak untuk mencegah SQL Injection di PHP adalah dengan menggunakan <b>Prepared Statements (Parameterize Queries)</b>. Dengan cara ini, nilai input diperlakukan murni sebagai data teks, bukan bagian dari struktur SQL.</p>
                <div class="bg-slate-900 rounded-xl p-4 overflow-x-auto">
                    <pre><code class="text-emerald-400 text-sm font-mono">// CONTOH KODE YANG AMAN (Menggunakan PDO Prepare)
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $pdo->prepare($sql);
// Parameter dikirim terpisah saat execute()
$stmt->execute([$username, $hashed_password]);
$user = $stmt->fetch();</code></pre>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden mb-12">
        <div class="bg-amber-50 border-b border-amber-100 p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center font-bold text-xl shadow-inner">XSS</div>
            <h2 class="text-2xl font-bold text-slate-800">2. Cross-Site Scripting (XSS)</h2>
        </div>

        <div class="p-6 md:p-8 space-y-8">
            <div>
                <h3 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg> Konsep Dasar
                </h3>
                <p class="text-slate-600 mb-4 leading-relaxed">XSS terjadi ketika aplikasi web menampilkan data yang tidak disanitasi ke dalam halaman HTML. Hal ini memungkinkan penyerang menyisipkan kode JavaScript berbahaya yang akan dieksekusi oleh browser pengguna lain (misalnya untuk mencuri <i>cookie/session</i>).</p>

            </div>

            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                <h3 class="text-lg font-bold text-amber-600 mb-3">⚔️ Skenario Serangan (Eksploitasi)</h3>

                <div class="mb-5">
                    <h4 class="font-bold text-slate-700 mb-1">A. Reflected XSS (Halaman Pencarian Mahasiswa)</h4>
                    <p class="text-sm text-slate-600 mb-2">Payload dipantulkan kembali secara langsung oleh server. Umumnya didistribusikan melalui link phising.</p>
                    <ul class="list-disc list-inside text-sm text-slate-600 space-y-1">
                        <li>Buka form pencarian mahasiswa.</li>
                        <li>Masukkan payload: <code class="bg-amber-100 text-amber-800 px-1.5 py-0.5 rounded">&lt;script&gt;alert(document.cookie)&lt;/script&gt;</code></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-slate-700 mb-1">B. Stored XSS (Halaman Forum Diskusi)</h4>
                    <p class="text-sm text-slate-600 mb-2">Sangat berbahaya karena payload disimpan ke dalam database. Siapapun yang membuka halaman forum akan terserang tanpa harus mengklik link tertentu.</p>
                    <ul class="list-disc list-inside text-sm text-slate-600 space-y-1">
                        <li>Buka menu Forum Diskusi (pastikan sudah login).</li>
                        <li>Pada kolom <b>Isi Pengumuman</b>, masukkan script HTML/JS: <code class="bg-amber-100 text-amber-800 px-1.5 py-0.5 rounded block mt-1">&lt;img src="x" onerror="alert('Sistem Diretas!')"&gt;</code></li>
                        <li>Klik Posting. Script akan terus tereksekusi setiap kali halaman dimuat.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-emerald-50 p-6 rounded-2xl border border-emerald-100">
                <h3 class="text-lg font-bold text-emerald-700 mb-3">🛡️ Solusi Keamanan (Mitigasi)</h3>
                <p class="text-sm text-slate-600 mb-3">Cara paling efektif untuk mencegah XSS adalah dengan melakukan <b>Output Encoding / Sanitization</b>. Di PHP, kita harus membungkus semua output variabel yang berasal dari user menggunakan fungsi bawaan <code>htmlspecialchars()</code> sebelum mencetaknya ke HTML.</p>
                <div class="bg-slate-900 rounded-xl p-4 overflow-x-auto">
                    <pre><code class="text-emerald-400 text-sm font-mono">// CONTOH KODE YANG RENTAN (TIDAK AMAN)
echo $forum['isi'];

// CONTOH KODE YANG AMAN (Sanitasi XSS)
// Mengubah karakter '&lt;' menjadi '&amp;lt;' sehingga browser 
// membacanya sebagai teks biasa, bukan sebagai eksekusi script.
echo htmlspecialchars($forum['isi'], ENT_QUOTES, 'UTF-8');</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>