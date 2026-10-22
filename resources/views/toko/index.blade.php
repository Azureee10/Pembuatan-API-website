<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semua Toko | Sarai Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-[#444] antialiased">
    <div class="bg-[#f7f7f7] px-4 py-1 text-[10px] text-[#888]">
        <div class="mx-auto flex max-w-[1400px] justify-between"><span>Gratis Ongkir untuk pesanan pilihan</span><span class="hidden gap-4 sm:flex"><span>Bantuan</span><span>Konfirmasi Pembayaran</span><span>Belanja aman</span></span></div>
    </div>
    <header class="border-b border-[#e8e8e8] bg-white">
        <div class="mx-auto flex max-w-[1400px] items-center gap-4 px-4 py-3 sm:gap-7">
            <a href="{{ route('dashboard') }}" class="shrink-0 text-2xl font-black tracking-[-0.08em] text-[#f28b00] sm:text-3xl">Sarai Market<span>.</span><small class="ml-1 text-[8px] font-normal tracking-normal text-[#777]">Tempat Belanja Online</small></a>
            <div class="hidden flex-1 sm:block"></div>
            <span class="hidden text-[11px] text-[#777] md:block">Hi, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="text-[11px] text-[#777] hover:text-[#f28b00]">Keluar</button></form>
            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f28b00] text-white" aria-label="Keranjang">&#128722;</span>
        </div>
        <nav class="border-t border-[#f0f0f0] border-b-4 border-b-[#ffe900]" aria-label="Navigasi marketplace">
            <div class="mx-auto flex max-w-[1400px] items-center gap-6 overflow-x-auto px-4 py-2 text-[11px] font-bold whitespace-nowrap"><a href="#toko" class="text-[#f28b00]">TOKO</a><a href="{{ route('dashboard') }}" class="hover:text-[#f28b00]">Dashboard</a></div>
        </nav>
    </header>

    <main class="mx-auto max-w-[1400px] px-3 py-7 sm:px-5">
        <div class="flex items-end justify-between border-b border-[#e8e8e8] pb-3">
            <div>
                <a href="{{ route('dashboard') }}" class="text-[10px] font-semibold text-[#f28b00]">&lt; Kembali ke dashboard</a>
                <h1 class="mt-3 text-xl font-bold text-[#333]">Semua Toko</h1>
                <p class="mt-1 text-xs text-[#888]">Temukan produk pilihan dari toko terpercaya.</p>
            </div>
            <span class="hidden text-xs text-[#888] sm:block">20 toko tersedia</span>
        </div>

        @php
        $stores = [
        ['id' => 'walmart', 'name' => 'Walmart', 'icon' => '🛒', 'color' => 'bg-[#fff4dc] text-[#8d5b00]', 'products' => [
        ['Goldenfi Strawberry Jam - 1kg', 'Rp 43.500', 'photo-1551024506-0bccd828d307'],
        ['Gerber Graduates Puff Sweet', 'Rp 57.000', 'photo-1551024709-8f23befc6f87'],
        ['Portable Lunch Box', 'Rp 68.000', 'photo-1495474472287-4d71bcdd2085'],
        ]],
        ['id' => 'amazon', 'name' => 'Amazon', 'icon' => '📦', 'color' => 'bg-[#edf5ff] text-[#1f5fe3]', 'products' => [
        ['Bbox Bottle and Dispenser 240 ml', 'Rp 230.000', 'photo-1602143407151-7111542de6e8'],
        ['Bamboo Organizer Box', 'Rp 78.000', 'photo-1524758631624-e2822e304c36'],
        ['Daily Sunscreen', 'Rp 95.000', 'photo-1584839404042-8bcf6b8d3e8e'],
        ]],
        ['id' => 'diy', 'name' => 'DIY', 'icon' => '🛠️', 'color' => 'bg-[#eafaf3] text-[#137b52]', 'products' => [
        ['Kitchen Storage Set', 'Rp 125.000', 'photo-1505693416388-ac5ce068fe85'],
        ['Mug Set Family', 'Rp 96.000', 'photo-1445116572660-236099ec97a0'],
        ['Bottle Warmer Premium', 'Rp 185.000', 'photo-1512436991641-6745cdb1723f'],
        ]],
        ['id' => 'alibaba', 'name' => 'Alibaba', 'icon' => '🌍', 'color' => 'bg-[#fff0f4] text-[#9b356c]', 'products' => [
        ['Goldenfi Tiramisu Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'],
        ['Little Palmerhaus Baby Bodysuits', 'Rp 55.000', 'photo-1519238263530-99bdd11df2ea'],
        ['Glow Serum Vitamin C', 'Rp 120.000', 'photo-1522335789203-aabd1fc54bc9'],
        ]],
        ['id' => 'lainnya', 'name' => 'Lainnya', 'icon' => '✨', 'color' => 'bg-[#f1f1f1] text-[#555]', 'products' => [
        ['Goldenfi Choco Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'],
        ['Hydrating Face Mist', 'Rp 85.000', 'photo-1556228720-195a672e8a03'],
        ['Body Lotion Aloe', 'Rp 67.000', 'photo-1556228578-8c89e6adf883'],
        ]],
        ['id' => 'jakarta', 'name' => 'Jakarta Mart', 'icon' => '🏙️', 'color' => 'bg-[#fff1e8] text-[#bd5a24]', 'products' => [
        ['Paket Sembako Keluarga', 'Rp 145.000', 'photo-1542838132-92c53300491e'],
        ['Kopi Nusantara', 'Rp 68.000', 'photo-1495474472287-4d71bcdd2085'],
        ]],
        ['id' => 'bandung', 'name' => 'Bandung Pilihan', 'icon' => '🌼', 'color' => 'bg-[#fff9df] text-[#967000]', 'products' => [
        ['Kue Kering Premium', 'Rp 75.000', 'photo-1558961363-fa8fdf82db35'],
        ['Teh Melati Wangi', 'Rp 42.000', 'photo-1594631252845-29fc4cc8cde9'],
        ]],
        ['id' => 'surabaya', 'name' => 'Surabaya Sejahtera', 'icon' => '🏪', 'color' => 'bg-[#eaf4ff] text-[#2458af]', 'products' => [
        ['Keripik Oleh-Oleh', 'Rp 35.000', 'photo-1621939514649-280e2aa58f7f'],
        ['Bumbu Masak Lengkap', 'Rp 55.000', 'photo-1596040033229-a9821ebd058d'],
        ]],
        ['id' => 'yogyakarta', 'name' => 'Jogja Warna', 'icon' => '🎨', 'color' => 'bg-[#fff0f4] text-[#9b356c]', 'products' => [
        ['Batik Motif Nusantara', 'Rp 185.000', 'photo-1610030469983-98e550d6193c'],
        ['Cokelat Tradisional', 'Rp 48.000', 'photo-1548907040-4d42fcaa0e4d'],
        ]],
        ['id' => 'bali', 'name' => 'Bali Sejahtera', 'icon' => '🌴', 'color' => 'bg-[#e9f8f1] text-[#137b52]', 'products' => [
        ['Body Scrub Coconut', 'Rp 89.000', 'photo-1556229010-6c3f2c9ca5f8'],
        ['Kopi Bali Arabica', 'Rp 82.000', 'photo-1514432324607-a09d9b4aefdd'],
        ]],
        ['id' => 'medan', 'name' => 'Medan Fresh', 'icon' => '🍊', 'color' => 'bg-[#fff4dc] text-[#8d5b00]', 'products' => [
        ['Manisan Buah Segar', 'Rp 52.000', 'photo-1490474418585-ba9bad8fd0ea'],
        ['Sambal Andaliman', 'Rp 45.000', 'photo-1601050690597-df0568f70950'],
        ]],
        ['id' => 'makassar', 'name' => 'Makassar Hub', 'icon' => '⚓', 'color' => 'bg-[#edf5ff] text-[#1f5fe3]', 'products' => [
        ['Kacang Macadamia', 'Rp 110.000', 'photo-1599599810769-bcde5a160d32'],
        ['Abon Ikan Cakalang', 'Rp 65.000', 'photo-1544943910-4c1dc44aab44'],
        ]],
        ['id' => 'semarang', 'name' => 'Semarang Jaya', 'icon' => '🏠', 'color' => 'bg-[#f1f1f1] text-[#555]', 'products' => [
        ['Lumpia Frozen', 'Rp 60.000', 'photo-1601050690117-94f5f6fa8bd7'],
        ['Sambal Terasi', 'Rp 32.000', 'photo-1585032226651-759b368d7246'],
        ]],
        ['id' => 'palembang', 'name' => 'Palembang Sentral', 'icon' => '🛍️', 'color' => 'bg-[#fff1eb] text-[#c35b2b]', 'products' => [
        ['Pempek Kapal Selam', 'Rp 85.000', 'photo-1626082927389-6cd097cdc6ec'],
        ['Kemplang Ikan', 'Rp 38.000', 'photo-1558961363-fa8fdf82db35'],
        ]],
        ['id' => 'pekanbaru', 'name' => 'Pekanbaru Store', 'icon' => '🌿', 'color' => 'bg-[#eafaf3] text-[#137b52]', 'products' => [
        ['Madu Hutan Asli', 'Rp 125.000', 'photo-1587049352846-4a222e784d38'],
        ['Kerupuk Ikan Renyah', 'Rp 40.000', 'photo-1621939514649-280e2aa58f7f'],
        ]],
        ['id' => 'banjarmasin', 'name' => 'Banjarmasin Mart', 'icon' => '🚤', 'color' => 'bg-[#eef4ff] text-[#2458af]', 'products' => [
        ['Ikan Gabus Kering', 'Rp 72.000', 'photo-1544943910-4c1dc44aab44'],
        ['Kain Sasirangan', 'Rp 150.000', 'photo-1610030469983-98e550d6193c'],
        ]],
        ['id' => 'balikpapan', 'name' => 'Balikpapan Choice', 'icon' => '🌊', 'color' => 'bg-[#e9f7ee] text-[#0f7b4d]', 'products' => [
        ['Minyak Kelapa Murni', 'Rp 76.000', 'photo-1556228578-8c89e6adf883'],
        ['Granola Sarapan', 'Rp 69.000', 'photo-1512621776951-a57141f2eefd'],
        ]],
        ['id' => 'manado', 'name' => 'Manado Choice', 'icon' => '🐚', 'color' => 'bg-[#fff0f7] text-[#a13674]', 'products' => [
        ['Sambal Roa Pedas', 'Rp 58.000', 'photo-1601050690597-df0568f70950'],
        ['Kopi Toraja Pilihan', 'Rp 95.000', 'photo-1495474472287-4d71bcdd2085'],
        ]],
        ['id' => 'jayapura', 'name' => 'Jayapura Abadi', 'icon' => '🌺', 'color' => 'bg-[#fff5df] text-[#8a5a00]', 'products' => [
        ['Madu Papua', 'Rp 135.000', 'photo-1587049352846-4a222e784d38'],
        ['Kerajinan Noken', 'Rp 175.000', 'photo-1524758631624-e2822e304c36'],
        ]],
        ['id' => 'kupang', 'name' => 'Kupang Nusa', 'icon' => '☀️', 'color' => 'bg-[#fff4dc] text-[#8d5b00]', 'products' => [
        ['Kacang Kenari Panggang', 'Rp 78.000', 'photo-1599599810769-bcde5a160d32'],
        ['Tenun Ikat Nusa', 'Rp 210.000', 'photo-1610030469983-98e550d6193c'],
        ]],
        ];
        @endphp

        <section id="toko" class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($stores as $store)
            <a href="{{ route('toko.home', $store['id']) }}" class="group rounded-2xl border border-[#f0f0f0] p-4 shadow-sm transition hover:-translate-y-1 hover:border-[#f28b00] hover:shadow-md {{ $store['color'] }}">
                <div class="mb-3 text-2xl">{{ $store['icon'] }}</div>
                <div class="text-[11px] font-black uppercase tracking-[0.18em]">{{ $store['name'] }}</div>
                <div class="mt-2 text-[10px] font-medium opacity-80">{{ count($store['products']) }} produk pilihan</div>
            </a>
            @endforeach
        </section>
    </main>

    <div id="notice" class="pointer-events-none fixed bottom-5 left-1/2 z-20 -translate-x-1/2 translate-y-4 rounded-full bg-[#444] px-5 py-3 text-xs font-semibold text-white opacity-0 shadow-xl transition-all" role="status"></div>
    <script>
        function notify(product) {
            const notice = document.getElementById('notice');
            notice.textContent = product + ' ditambahkan ke keranjang';
            notice.classList.remove('translate-y-4', 'opacity-0');
            clearTimeout(window.noticeTimer);
            window.noticeTimer = setTimeout(() => notice.classList.add('translate-y-4', 'opacity-0'), 2200);
        }
    </script>
</body>

</html>
