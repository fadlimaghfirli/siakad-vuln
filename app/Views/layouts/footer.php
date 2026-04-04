</main>

<footer class="bg-white border-t border-slate-200 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-center md:text-left">
                <p class="text-slate-800 font-semibold text-lg flex items-center justify-center md:justify-start gap-2">
                    <span class="w-6 h-6 bg-brand-600 text-white rounded-md flex items-center justify-center text-xs">S</span> SIAKAD
                </p>
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

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
</body>

</html>