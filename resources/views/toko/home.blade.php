<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $store['name'] }} | Sarai Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-[#444] antialiased">
    <div class="bg-[#f7f7f7] px-4 py-1 text-[10px] text-[#888]">
        <div class="mx-auto flex max-w-[1200px] justify-between"><span>Gratis Ongkir untuk pesanan pilihan</span><span class="hidden gap-4 sm:flex"><span>Bantuan</span><span>Belanja aman</span></span></div>
    </div>
    <header class="border-b border-[#e8e8e8] bg-white">
        <div class="mx-auto flex max-w-[1200px] items-center gap-4 px-4 py-4">
            <a href="{{ route('dashboard') }}" class="shrink-0 text-2xl font-black tracking-[-0.08em] text-[#f28b00] sm:text-3xl">Sarai Market<span>.</span></a>
            <div class="hidden flex-1 sm:block"></div>
            <span class="hidden text-[11px] text-[#777] sm:block">Hi, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="text-[11px] text-[#777] hover:text-[#f28b00]">Keluar</button></form>
            <span class="grid h-9 w-9 place-items-center rounded-full bg-[#f28b00] text-white" aria-label="Keranjang">&#128722;</span>
        </div>
        <nav class="border-t border-[#f0f0f0] border-b-4 border-b-[#ffe900]">
            <div class="mx-auto flex max-w-[1200px] gap-6 px-4 py-2 text-[11px] font-bold"><a href="{{ route('toko.index') }}" class="text-[#f28b00]">TOKO</a><a href="{{ route('dashboard') }}" class="hover:text-[#f28b00]">Dashboard</a></div>
        </nav>
    </header>

    <main class="mx-auto max-w-[1200px] px-4 py-6 sm:px-6">
        <a href="{{ route('toko.index') }}" class="text-[10px] font-semibold text-[#f28b00]">&lt; Kembali ke semua toko</a>
        <section class="mt-4 overflow-hidden rounded-2xl border border-[#f0f0f0] bg-gradient-to-r from-[#fff5df] to-[#fffaf2] p-6 sm:p-8">
            <div class="flex flex-col items-start gap-5 sm:flex-row sm:items-center">
                <div class="grid h-20 w-20 shrink-0 place-items-center rounded-2xl bg-white text-4xl shadow-sm">{{ $store['icon'] }}</div>
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#f28b00]">Official store di Sarai Market</p>
                    <h1 class="mt-2 text-2xl font-black text-[#333]">{{ $store['name'] }}</h1>
                    <p class="mt-2 text-xs text-[#777]">Produk pilihan berkualitas, dikemas dengan baik dan dikirim ke seluruh Indonesia.</p>
                    <div class="mt-3 flex gap-4 text-[10px] text-[#777]"><span>★ 4.9/5</span><span>Terpercaya</span><span>Gratis ongkir</span></div>
                </div>
            </div>
        </section>

        @php
        $walmartProducts = [
        ['Produk Pilihan ' . $store['name'], 'Makanan & Minuman', 'Rp 75.000', 'photo-1551024506-0bccd828d307'],
        ['Kopi Nusantara Premium', 'Makanan & Minuman', 'Rp 95.000', 'photo-1495474472287-4d71bcdd2085'],
        ['Paket Sembako Keluarga', 'Makanan & Minuman', 'Rp 145.000', 'photo-1542838132-92c53300491e'],
        ['Camilan Keripik Pilihan', 'Makanan & Minuman', 'Rp 38.000', 'photo-1621939514649-280e2aa58f7f'],
        ['Madu Hutan Murni', 'Makanan & Minuman', 'Rp 125.000', 'photo-1587049352846-4a222e784d38'],
        ['Paket Perawatan Bayi', 'Perawatan Bayi', 'Rp 165.000', 'photo-1519238263530-99bdd11df2ea'],
        ['Botol Minum Anak', 'Perawatan Bayi', 'Rp 85.000', 'photo-1602143407151-7111542de6e8'],
        ['Baju Tidur Bayi', 'Perawatan Bayi', 'Rp 95.000', 'photo-1519238263530-99bdd11df2ea'],
        ['Set Perlengkapan Mandi Bayi', 'Perawatan Bayi', 'Rp 115.000', 'photo-1604917019117-0b2b9d25f4d9'],
        ['Bamboo Organizer Box', 'Kebutuhan Rumah', 'Rp 78.000', 'photo-1524758631624-e2822e304c36'],
        ['Paket Dapur Praktis', 'Kebutuhan Rumah', 'Rp 125.000', 'photo-1505693416388-ac5ce068fe85'],
        ['Rak Serbaguna Minimalis', 'Kebutuhan Rumah', 'Rp 165.000', 'photo-1558997519-83ea9252edf8'],
        ['Sprei Katun Premium', 'Kebutuhan Rumah', 'Rp 180.000', 'photo-1505693416388-ac5ce068fe85'],
        ['Glow Serum Vitamin C', 'Kecantikan', 'Rp 120.000', 'photo-1522335789203-aabd1fc54bc9'],
        ['Body Lotion Aloe', 'Kecantikan', 'Rp 67.000', 'photo-1556228578-8c89e6adf883'],
        ['Facial Wash Gentle Care', 'Kecantikan', 'Rp 58.000', 'photo-1556228720-195a672e8a03'],
        ['Lip Balm Natural', 'Kecantikan', 'Rp 35.000', 'photo-1522335789203-aabd1fc54bc9'],
        ['Batik Motif Nusantara', 'Fashion', 'Rp 185.000', 'photo-1610030469983-98e550d6193c'],
        ['Tas Belanja Kanvas', 'Fashion', 'Rp 65.000', 'photo-1553062407-98eeb64c6a62'],
        ['Kemeja Linen Casual', 'Fashion', 'Rp 225.000', 'photo-1596755389378-c31d21fd1273'],
        ['Sandal Rumah Nyaman', 'Fashion', 'Rp 78.000', 'photo-1542291026-7eec264c27ff'],
        ['Paket Alat Tulis Lengkap', 'Perlengkapan', 'Rp 55.000', 'photo-1456735190827-d1262f71b8a3'],
        ['Buku Catatan Hardcover', 'Perlengkapan', 'Rp 42.000', 'photo-1495446815901-a7297e633e8d'],
        ['Pensil Warna 24 Isi', 'Perlengkapan', 'Rp 48.000', 'photo-1513475382585-d06e58bcb0e0'],
        ['Headset Wireless', 'Elektronik', 'Rp 175.000', 'photo-1505740420928-5e560c06d30e'],
        ['Lampu Meja Minimalis', 'Elektronik', 'Rp 135.000', 'photo-1507473885765-e6ed057f782c'],
        ['Power Bank Fast Charging', 'Elektronik', 'Rp 245.000', 'photo-1609592424756-7c6e3a2cc1b1'],
        ['Keyboard Wireless Slim', 'Elektronik', 'Rp 215.000', 'photo-1587829741301-dc798b83add3'],
        ['Matras Yoga Premium', 'Olahraga', 'Rp 185.000', 'photo-1592432678016-e910b452f9a2'],
        ['Botol Minum Olahraga', 'Olahraga', 'Rp 88.000', 'photo-1602143407151-7111542de6e8'],
        ['Resistance Band Set', 'Olahraga', 'Rp 72.000', 'photo-1599058917212-d750089bc07e'],
        ['Handuk Olahraga Quick Dry', 'Olahraga', 'Rp 65.000', 'photo-1600185365483-26d7a4cc7519'],
        ['Vitamin Harian Keluarga', 'Kesehatan', 'Rp 95.000', 'photo-1584308666744-24d5c474f2ae'],
        ['Termometer Digital', 'Kesehatan', 'Rp 72.000', 'photo-1584634731339-252c581abfc5'],
        ['Masker Kain Reusable', 'Kesehatan', 'Rp 35.000', 'photo-1583947215259-38e31be8751f'],
        ['Kotak P3K Keluarga', 'Kesehatan', 'Rp 125.000', 'photo-1603398938378-e54eab446dde'],
        ['Paket Makanan Kucing', 'Hewan Peliharaan', 'Rp 110.000', 'photo-1589924691995-400dc9ecc119'],
        ['Mainan Interaktif Anjing', 'Hewan Peliharaan', 'Rp 65.000', 'photo-1583337130417-3346a1be7dee'],
        ['Tempat Makan Hewan', 'Hewan Peliharaan', 'Rp 55.000', 'photo-1589924691995-400dc9ecc119'],
        ['Pasir Kucing Wangi', 'Hewan Peliharaan', 'Rp 92.000', 'photo-1574158622682-e40e69881006'],
        ['Car Organizer', 'Otomotif', 'Rp 98.000', 'photo-1542362567-b07e54358753'],
        ['Pompa Ban Portable', 'Otomotif', 'Rp 220.000', 'photo-1485965120184-e220f721d03e'],
        ['Cover Jok Mobil', 'Otomotif', 'Rp 175.000', 'photo-1504215680853-026ed2a45def'],
        ['Pengharum Mobil Premium', 'Otomotif', 'Rp 45.000', 'photo-1542362567-b07e54358753'],
        ['Novel Best Seller', 'Buku & Hobi', 'Rp 89.000', 'photo-1544947950-fa07a98d237f'],
        ['Puzzle Edukatif Anak', 'Buku & Hobi', 'Rp 58.000', 'photo-1606092195730-5d7b9af1efc5'],
        ['Album Foto Keluarga', 'Buku & Hobi', 'Rp 75.000', 'photo-1495446815901-a7297e633e8d'],
        ['Cat Air 12 Warna', 'Buku & Hobi', 'Rp 62.000', 'photo-1513364776144-60967b0f800f'],
        ['Jam Tangan Casual', 'Aksesoris', 'Rp 145.000', 'photo-1524805444758-089113d48a6d'],
        ['Dompet Kulit Sintetis', 'Aksesoris', 'Rp 115.000', 'photo-1627123424574-724758594e93'],
        ['Kacamata Fashion', 'Aksesoris', 'Rp 85.000', 'photo-1511499767150-a48a237f0083'],
        ['Topi Kanvas Unisex', 'Aksesoris', 'Rp 68.000', 'photo-1521369909029-2afed882baee'],
        ];
        $sharedProducts = array_slice($walmartProducts, 0, 8);
        $catalogAdditions = [
        'amazon' => [
        ['Smart TV 43 Inch', 'Elektronik', 'Rp 3.250.000', 'photo-1593784991095-a205069470b6'], ['Kamera Mirrorless', 'Elektronik', 'Rp 6.500.000', 'photo-1516035069371-29a1b244cc32'],
        ['Sepatu Running Pro', 'Olahraga', 'Rp 450.000', 'photo-1542291026-7eec264c27ff'], ['Tenda Camping 4 Orang', 'Outdoor', 'Rp 675.000', 'photo-1504851149312-7a075b496cc7'],
        ['Novel Internasional', 'Buku & Hobi', 'Rp 125.000', 'photo-1544947950-fa07a98d237f'], ['Koper Kabin Ringan', 'Travel', 'Rp 550.000', 'photo-1553531384-cc64ac80f931'],
        ],
        'diy' => [
        ['Bor Tangan Cordless', 'Perkakas', 'Rp 425.000', 'photo-1504148455328-c376907d081c'], ['Set Obeng Profesional', 'Perkakas', 'Rp 135.000', 'photo-1581147036324-c17ac41a96fa'],
        ['Cat Dinding Interior', 'Renovasi Rumah', 'Rp 185.000', 'photo-1562259949-e8e768e8e8e0'], ['Rak Besi Gudang', 'Renovasi Rumah', 'Rp 375.000', 'photo-1558997519-83ea9252edf8'],
        ['Lampu Taman Solar', 'Taman', 'Rp 95.000', 'photo-1598902108854-10e335adac99'], ['Bibit Tanaman Hias', 'Taman', 'Rp 45.000', 'photo-1416879595882-3373a0480b5b'],
        ],
        'alibaba' => [
        ['Dress Casual Import', 'Fashion', 'Rp 285.000', 'photo-1496747611176-843222e1e57c'], ['Sneakers Limited Edition', 'Fashion', 'Rp 520.000', 'photo-1542291026-7eec264c27ff'],
        ['Lampu LED Dekorasi', 'Dekorasi', 'Rp 115.000', 'photo-1507473885765-e6ed057f782c'], ['Vas Keramik Modern', 'Dekorasi', 'Rp 175.000', 'photo-1610701596007-11502861dcfa'],
        ['Gadget Holder', 'Aksesoris Gadget', 'Rp 65.000', 'photo-1601784551446-20c9e07cdbdb'], ['Charger Universal', 'Aksesoris Gadget', 'Rp 95.000', 'photo-1583863788434-e58a36330cf0'],
        ],
        'jakarta' => [
        ['Nasi Goreng Frozen', 'Makanan Siap Saji', 'Rp 48.000', 'photo-1601050690597-df0568f70950'], ['Paket Buah Segar', 'Makanan Siap Saji', 'Rp 85.000', 'photo-1490474418585-ba9bad8fd0ea'],
        ['Kemeja Kantor', 'Fashion Kerja', 'Rp 195.000', 'photo-1596755389378-c31d21fd1273'], ['Tas Laptop Kerja', 'Fashion Kerja', 'Rp 245.000', 'photo-1553062407-98eeb64c6a62'],
        ['Jasa Hampers Premium', 'Hadiah', 'Rp 225.000', 'photo-1549465220-1a8b9238cd48'], ['Buket Bunga Segar', 'Hadiah', 'Rp 175.000', 'photo-1490750967868-88aa4486c946'],
        ],
        'bandung' => [
        ['Brownies Kukus Bandung', 'Kuliner Daerah', 'Rp 65.000', 'photo-1578985545062-69928b1d9587'], ['Peuyeum Singkong', 'Kuliner Daerah', 'Rp 35.000', 'photo-1601050690597-df0568f70950'],
        ['Jaket Denim Lokal', 'Fashion Lokal', 'Rp 275.000', 'photo-1551028719-00167b16eac5'], ['Kaos Kreatif Bandung', 'Fashion Lokal', 'Rp 95.000', 'photo-1521572163474-6864f9cf17ab'],
        ['Lukisan Kanvas', 'Seni', 'Rp 350.000', 'photo-1549490349-8643362247b5'], ['Alat Lukis Lengkap', 'Seni', 'Rp 145.000', 'photo-1513364776144-60967b0f800f'],
        ],
        'surabaya' => [
        ['Sambal Petis', 'Kuliner Daerah', 'Rp 42.000', 'photo-1601050690597-df0568f70950'], ['Kerupuk Udang', 'Kuliner Daerah', 'Rp 38.000', 'photo-1621939514649-280e2aa58f7f'],
        ['Seragam Sekolah Anak', 'Pakaian Anak', 'Rp 125.000', 'photo-1519238263530-99bdd11df2ea'], ['Sepatu Sekolah', 'Pakaian Anak', 'Rp 165.000', 'photo-1542291026-7eec264c27ff'],
        ['Peralatan Nelayan', 'Perlengkapan Kerja', 'Rp 225.000', 'photo-1530053969600-caed2596d242'], ['Sarung Tangan Kerja', 'Perlengkapan Kerja', 'Rp 55.000', 'photo-1584820927498-cfe5211fd8bf'],
        ],
        ];
        $defaultAdditions = [
        ['Paket Oleh-Oleh ' . $store['name'], 'Makanan Daerah', 'Rp 85.000', 'photo-1621939514649-280e2aa58f7f'], ['Teh Herbal ' . $store['name'], 'Minuman Herbal', 'Rp 58.000', 'photo-1594631252845-29fc4cc8cde9'],
        ['Kain Tradisional ' . $store['name'], 'Kerajinan Lokal', 'Rp 195.000', 'photo-1610030469983-98e550d6193c'], ['Keranjang Anyaman ' . $store['name'], 'Kerajinan Lokal', 'Rp 135.000', 'photo-1524758631624-e2822e304c36'],
        ['Paket Kebersihan ' . $store['name'], 'Kebutuhan Harian', 'Rp 78.000', 'photo-1583947215259-38e31be8751f'], ['Sabun Natural ' . $store['name'], 'Kebutuhan Harian', 'Rp 45.000', 'photo-1556228578-8c89e6adf883'],
        ];
        $products = $store['id'] === 'walmart'
        ? $walmartProducts
        : array_merge($sharedProducts, $catalogAdditions[$store['id']] ?? $defaultAdditions);
        $categories = array_values(array_unique(array_merge(['Semua'], array_column($products, 1))));
        @endphp
        <section class="mt-8">
            <div class="flex items-center justify-between border-b border-[#e8e8e8] pb-3">
                <div>
                    <h2 class="text-sm font-bold text-[#444]">Produk dari {{ $store['name'] }}</h2>
                    <p class="mt-1 text-[10px] text-[#888]">Pilihan terbaik dari toko ini</p>
                </div><span class="text-[10px] text-[#888]">{{ count($products) }} produk</span>
            </div>
            <div class="mt-5 flex gap-2 overflow-x-auto pb-2">
                @foreach ($categories as $category)
                <button type="button" data-category-filter="{{ $category }}" class="store-category whitespace-nowrap rounded-full border border-[#e8e8e8] px-3 py-2 text-[10px] font-semibold text-[#666] transition hover:border-[#f28b00] hover:text-[#f28b00] {{ $category === 'Semua' ? 'border-[#f28b00] bg-[#fff5e8] text-[#f28b00]' : '' }}">{{ $category }}</button>
                @endforeach
            </div>
            <div class="mt-4 grid grid-cols-2 gap-x-4 gap-y-7 sm:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                <article data-product-category="{{ $product[1] }}" class="store-product group min-w-0">
                    <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug($product[0]), 'name' => $product[0], 'price' => $product[2], 'image' => $product[3], 'category' => $product[1], 'store' => $store['name']]) }}" class="block rounded focus:outline-none focus:ring-2 focus:ring-[#f28b00]">
                        <div class="marketplace-product-image rounded bg-[#fafafa]"><img src="https://images.unsplash.com/{{ $product[3] }}?auto=format&fit=crop&w=500&q=80" alt="{{ $product[0] }}" class="transition duration-300 group-hover:scale-105"><span class="absolute right-2 top-2 rounded-full bg-[#444] px-2 py-1 text-[8px] text-white">New</span></div>
                        <h3 class="mt-3 min-h-8 text-[10px] leading-4 text-[#555]">{{ $product[0] }}</h3>
                        <p class="mt-1 text-[9px] text-[#999]">{{ $product[1] }}</p>
                        <p class="mt-2 text-[11px] font-bold text-[#777]">{{ $product[2] }}</p>
                    </a>
                    <button type="button" class="mt-2 grid h-7 w-7 place-items-center rounded-full bg-[#4a4a4a] text-sm text-white hover:bg-[#f28b00]" aria-label="Tambah {{ $product[0] }}">&#128722;</button>
                </article>
                @endforeach
            </div>
        </section>
    </main>

    <script>
        document.querySelectorAll('[data-category-filter]').forEach((button) => {
            button.addEventListener('click', () => {
                const category = button.dataset.categoryFilter;
                document.querySelectorAll('[data-category-filter]').forEach((item) => item.classList.remove('border-[#f28b00]', 'bg-[#fff5e8]', 'text-[#f28b00]'));
                button.classList.add('border-[#f28b00]', 'bg-[#fff5e8]', 'text-[#f28b00]');
                document.querySelectorAll('.store-product').forEach((product) => {
                    product.classList.toggle('hidden', category !== 'Semua' && product.dataset.productCategory !== category);
                });
            });
        });
    </script>
</body>

</html>
