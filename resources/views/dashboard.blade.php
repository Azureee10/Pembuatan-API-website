<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sarai Market | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-[#444] antialiased">
    <div class="bg-[#f7f7f7] px-4 py-1 text-[10px] text-[#888]">
        <div class="mx-auto flex max-w-[1400px] justify-between"><span>Gratis Ongkir untuk pesanan pilihan</span><span class="hidden gap-4 sm:flex"><span>Bantuan</span><span>Konfirmasi Pembayaran</span><span>Belanja aman</span></span></div>
    </div>
    <header class="border-b border-[#e8e8e8] bg-white">
        <div class="mx-auto flex max-w-[1400px] items-center gap-4 px-4 py-3 sm:gap-7">
            <a href="{{ route('dashboard') }}" class="hidden shrink-0 text-2xl font-black tracking-[-0.08em] text-[#f28b00] sm:block sm:text-3xl">Sarai Market<span>.</span><small class="ml-1 text-[8px] font-normal tracking-normal text-[#777]">Tempat Belanja Online</small></a>
            <label class="hidden h-9 flex-1 items-center rounded border border-[#ddd] px-3 text-xs text-[#999] sm:flex"><svg class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7" />
                    <path d="m16 16 5 5" />
                </svg><input id="product-search" type="search" placeholder="Cari Produk, Merek atau Kategori" class="w-full border-0 p-0 text-xs outline-none focus:ring-0" oninput="filterProducts(this.value)"></label>
            <div class="hidden items-center gap-4 text-[11px] text-[#777] md:flex"><span>Hi, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="hover:text-[#f28b00]">Keluar</button></form>
            </div>
            <button id="mobile-menu-button" type="button" class="ml-auto grid h-9 w-9 shrink-0 place-items-center rounded border border-[#ddd] text-[#444] md:hidden" aria-label="Buka pengaturan aplikasi" aria-expanded="false" onclick="toggleMobileMenu()">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M4 6h16" />
                    <path d="M4 12h16" />
                    <path d="M4 18h16" />
                </svg>
            </button>
            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f28b00] text-white" aria-label="Keranjang">&#128722;</span>
        </div>
        <nav class="border-t border-[#f0f0f0] border-b-4 border-b-[#ffe900]" aria-label="Navigasi marketplace">
            <div id="desktop-navigation" class="mx-auto flex max-w-[1400px] items-center gap-6 overflow-x-auto px-4 py-2 text-[11px] font-bold whitespace-nowrap"><a href="#kategori" class="text-[#f28b00]">KATEGORI</a><a href="{{ route('dashboard') }}" class="text-[#f28b00]">Dashboard</a><a href="#kategori" class="hover:text-[#f28b00]">Kategori Produk</a><a href="{{ route('toko.index') }}" class="hover:text-[#f28b00]">Toko</a><a href="#tentang" class="hover:text-[#f28b00]">Tentang Kami</a><a href="#kontak" class="hover:text-[#f28b00]">Kontak</a><span class="ml-auto hidden text-[10px] font-normal text-[#999] lg:block">Pengiriman ke seluruh Indonesia</span></div>
            <div id="mobile-navigation-backdrop" class="app-settings-backdrop" onclick="toggleMobileMenu(false)"></div>
            <aside id="mobile-navigation" class="app-settings-drawer" aria-label="Pengaturan aplikasi" aria-hidden="true">
                <div class="flex items-center justify-between border-b border-[#f0f0f0] px-5 py-4"><span class="text-sm font-bold text-[#444]">Pengaturan Aplikasi</span><button type="button" class="grid h-8 w-8 place-items-center rounded border border-[#ddd] text-lg text-[#777]" aria-label="Tutup pengaturan" onclick="toggleMobileMenu(false)">&times;</button></div>
                <div class="grid gap-3 px-5 py-4 text-xs font-semibold"><a href="{{ route('profile.edit') }}" class="text-[#f28b00]">Profil &amp; Keamanan</a><a href="{{ route('dashboard') }}">Kembali ke Dashboard</a><span class="border-t border-[#f0f0f0] pt-3 text-[#777]">Hi, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="text-left text-[#f28b00]">Keluar</button></form>
                </div>
            </aside>
        </nav>
    </header>

    <main class="mx-auto max-w-[1400px] px-3 py-4 sm:px-5">
        <section class="grid gap-2 sm:grid-cols-2 lg:grid-cols-4">
            <div class="marketplace-banner group rounded-sm bg-[#ffc8da] cursor-default"><img src="https://images.unsplash.com/photo-1556228578-8c89e6adf883?auto=format&fit=crop&w=700&q=85" alt="Produk perawatan" class="opacity-70 transition group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-[#ffb3d0]/80 to-transparent"></div>
                <div class="absolute left-4 top-5 text-[#9c3564]"><b class="block text-xl">New arrival</b><span class="text-xs">Pilihan terbaik untuk keluarga</span></div>
            </div>
            <div class="marketplace-banner group rounded-sm bg-[#9edff0] cursor-default"><img src="https://images.unsplash.com/photo-1584839404042-8bcf6b8d3e8e?auto=format&fit=crop&w=700&q=85" alt="Promo produk" class="opacity-70 transition group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-[#52c5e3]/70 to-transparent"></div>
                <div class="absolute left-4 top-5 text-white"><b class="block text-xl">PROMO</b><span class="text-xs">Produk pilihan hingga 20%</span></div>
            </div>
            <div class="marketplace-banner group rounded-sm bg-[#a7e9e5] cursor-default"><img src="https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=700&q=85" alt="Belanja hemat" class="opacity-70 transition group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-[#36c5bd]/70 to-transparent"></div>
                <div class="absolute left-4 top-5 text-white"><b class="block text-lg">Belanja hemat</b><span class="text-xs">Gratis ongkir hari ini</span></div>
            </div>
            <div class="marketplace-banner group rounded-sm bg-[#d8e8e9] cursor-default"><img src="https://images.unsplash.com/photo-1558317374-067fb5f30001?auto=format&fit=crop&w=700&q=85" alt="Produk siap dikirim" class="opacity-70 transition group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-[#b7dce2]/70 to-transparent"></div>
                <div class="absolute left-4 top-5 text-[#276473]"><b class="block text-lg">Ready stock</b><span class="text-xs">Kirim cepat setiap hari</span></div>
            </div>
        </section>

        <section id="produk" class="mt-8">
            <div class="flex items-center justify-between border-b border-[#e8e8e8] pb-3">
                <h2 class="text-sm font-bold text-[#444]">Produk Terbaru</h2><a href="#produk" class="text-xs font-semibold">Semua &gt;</a>
            </div>
            <div id="products" class="grid grid-cols-2 gap-x-4 gap-y-7 pt-4 sm:grid-cols-3 lg:grid-cols-5">
                @foreach ([['Goldenfi Strawberry Jam - 1kg', 'Rp 43.500', 'photo-1551024506-0bccd828d307'], ['Bbox Bottle and Dispenser 240 ml', 'Rp 230.000', 'photo-1602143407151-7111542de6e8'], ['Goldenfi Tiramisu Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'], ['Goldenfi Choco Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'], ['Little Palmerhaus Baby Bodysuits', 'Rp 55.000', 'photo-1519238263530-99bdd11df2ea'], ['Gerber Graduates Puff Sweet', 'Rp 57.000', 'photo-1551024709-8f23befc6f87'], ['Glow Serum Vitamin C', 'Rp 120.000', 'photo-1522335789203-aabd1fc54bc9'], ['Bamboo Organizer Box', 'Rp 78.000', 'photo-1524758631624-e2822e304c36'], ['Portable Lunch Box', 'Rp 68.000', 'photo-1495474472287-4d71bcdd2085'], ['Daily Sunscreen', 'Rp 95.000', 'photo-1584839404042-8bcf6b8d3e8e']] as $product)
                <article data-product="{{ strtolower($product[0]) }}" class="group min-w-0">
                    <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug($product[0]), 'name' => $product[0], 'price' => $product[1], 'image' => $product[2]]) }}" class="block rounded focus:outline-none focus:ring-2 focus:ring-[#f28b00]">
                        <div class="marketplace-product-image rounded bg-[#fafafa]"><img src="https://images.unsplash.com/{{ $product[2] }}?auto=format&fit=crop&w=500&q=80" alt="{{ $product[0] }}" class="transition duration-300 group-hover:scale-105"><span class="absolute right-2 top-2 rounded-full bg-[#444] px-2 py-1 text-[8px] text-white">New</span></div>
                        <h3 class="mt-3 min-h-8 text-[10px] leading-4 text-[#555]">{{ $product[0] }}</h3>
                        <p class="mt-2 text-[11px] font-bold text-[#777]">{{ $product[1] }}</p>
                    </a>
                    <div class="mt-2 flex items-center gap-3"><button type="button" class="grid h-7 w-7 place-items-center rounded-full bg-[#4a4a4a] text-sm text-white transition hover:bg-[#f28b00]" aria-label="Tambah {{ $product[0] }}" onclick="notify('{{ $product[0] }}')">&#128722;</button><button type="button" class="text-lg leading-none text-[#888]" aria-label="Simpan {{ $product[0] }}">&#9825;</button></div>
                </article>
                @endforeach
            </div>
        </section>

        <section class="mt-12 border-y border-[#eee] py-5">
            <div class="grid grid-cols-2 items-center gap-5 opacity-75 sm:grid-cols-3 lg:grid-cols-6"><span class="text-center text-xl font-black text-[#ed6432]">Bio-Oil</span><span class="text-center text-xl font-black text-[#e51e36]">pigeon</span><span class="text-center text-lg font-black italic text-[#77bf35]">Cetaphil</span><span class="text-center text-lg font-bold text-[#54a9df]">Baby Sebamed</span><span class="text-center text-sm font-semibold tracking-[0.18em] text-[#999]">little<br>palmerhaus</span><span class="text-center text-xl font-black text-[#2da9db]">PURE</span></div>
        </section>

        <section id="kategori" class="mt-8">
            <div class="flex items-center justify-between border-b border-[#e8e8e8] pb-3">
                <h2 class="text-sm font-bold text-[#444]">Kategori Produk</h2><a href="#kategori" class="text-xs font-semibold">Lihat semua &gt;</a>
            </div>

            <div class="mt-5 overflow-x-auto pb-2">
                <div class="flex min-w-max gap-3">
                    @php
                    $storeMenu = [
                    ['name' => 'Semua', 'color' => 'bg-[#fff5df] text-[#8a5a00]', 'icon' => '🏷️'],
                    ['name' => 'Makanan & Minuman', 'color' => 'bg-[#e9f7ee] text-[#0f7b4d]', 'icon' => '🥤'],
                    ['name' => 'Perawatan Bayi', 'color' => 'bg-[#fff0f7] text-[#a13674]', 'icon' => '🍼'],
                    ['name' => 'Kebutuhan Rumah', 'color' => 'bg-[#eef4ff] text-[#2458af]', 'icon' => '🏠'],
                    ['name' => 'Kecantikan', 'color' => 'bg-[#fff1eb] text-[#c35b2b]', 'icon' => '💄'],
                    ];
                    @endphp

                    @foreach ($storeMenu as $tab)
                    @php
                    $tabName = $tab['name'];
                    $tabValue = strtolower(str_replace(['&', ' '], ['', ' '], $tabName));
                    if ($tabName === 'Semua') {
                    $tabValue = 'semua';
                    } elseif (str_contains($tabName, '&')) {
                    $tabValue = strtolower(str_replace(['&'], ['dan'], $tabName));
                    }
                    @endphp
                    <button type="button" data-category="{{ $tabValue }}" class="category-tab {{ $tab['color'] }} flex items-center gap-2 rounded-xl border border-[#f0f0f0] px-4 py-3 text-left text-[10px] font-black uppercase tracking-[0.08em] shadow-sm transition hover:-translate-y-0.5 hover:shadow-md {{ $tabName === 'Semua' ? 'ring-2 ring-[#f28b00]/30 border-[#f28b00]' : '' }}">
                        <span class="text-base">{{ $tab['icon'] }}</span>
                        <span>{{ $tabName }}</span>
                    </button>
                    @endforeach
                </div>
            </div>

            @php
            $categories = [
            [
            'name' => 'Makanan & Minuman',
            'items' => [
            ['Gerber Graduates Puff Sweet', 'Rp 57.000', 'photo-1551024709-8f23befc6f87'],
            ['Gerber Graduates Puff Vanilla', 'Rp 55.000', 'photo-1587049352846-4a222e784d38'],
            ['Gerber Graduates Puff Strawberry', 'Rp 55.000', 'photo-1559181567-c3190ca9959b'],
            ['Goldenfi Strawberry Jam - 1kg', 'Rp 43.500', 'photo-1551024506-0bccd828d307'],
            ['Goldenfi Tiramisu Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'],
            ],
            ],
            [
            'name' => 'Perawatan Bayi',
            'items' => [
            ['Little Palmerhaus Baby Bodysuits', 'Rp 55.000', 'photo-1519238263530-99bdd11df2ea'],
            ['Bbox Bottle and Dispenser 240 ml', 'Rp 230.000', 'photo-1602143407151-7111542de6e8'],
            ['Gerber Graduates Puff Peach', 'Rp 57.000', 'photo-1573246123716-6b1782bfc499'],
            ['Gerber Graduates Puff Apple', 'Rp 55.000', 'photo-1560807707-8cc77767d783'],
            ['Goldenfi Choco Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'],
            ],
            ],
            [
            'name' => 'Kebutuhan Rumah',
            'items' => [
            ['Bamboo Organizer Box', 'Rp 78.000', 'photo-1524758631624-e2822e304c36'],
            ['Kitchen Storage Set', 'Rp 125.000', 'photo-1505693416388-ac5ce068fe85'],
            ['Bottle Warmer Premium', 'Rp 185.000', 'photo-1512436991641-6745cdb1723f'],
            ['Portable Lunch Box', 'Rp 68.000', 'photo-1495474472287-4d71bcdd2085'],
            ['Mug Set Family', 'Rp 96.000', 'photo-1445116572660-236099ec97a0'],
            ],
            ],
            [
            'name' => 'Kecantikan',
            'items' => [
            ['Glow Serum Vitamin C', 'Rp 120.000', 'photo-1522335789203-aabd1fc54bc9'],
            ['Hydrating Face Mist', 'Rp 85.000', 'photo-1556228720-195a672e8a03'],
            ['Body Lotion Aloe', 'Rp 67.000', 'photo-1556228578-8c89e6adf883'],
            ['Lip Balm Care', 'Rp 28.000', 'photo-1522335789203-aabd1fc54bc9'],
            ['Daily Sunscreen', 'Rp 95.000', 'photo-1584839404042-8bcf6b8d3e8e'],
            ],
            ],
            ];
            @endphp

            @foreach ($categories as $category)
            <div data-category-section="{{ strtolower(str_replace(['&'], ['dan'], $category['name'])) }}" class="category-section mt-8">
                <div class="mb-4 flex items-center justify-between border-b border-[#f1f1f1] pb-2">
                    <h3 class="text-sm font-bold text-[#444]">{{ $category['name'] }}</h3>
                    <a href="#kategori" class="text-[10px] font-semibold uppercase tracking-wide text-[#f28b00]">Lihat semua</a>
                </div>
                <div class="grid grid-cols-2 gap-x-4 gap-y-7 sm:grid-cols-3 lg:grid-cols-5">
                    @foreach ($category['items'] as $product)
                    <article data-product="{{ strtolower($product[0]) }}" data-category="{{ strtolower(str_replace(['&'], ['dan'], $category['name'])) }}" class="group min-w-0">
                        <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug($product[0]), 'name' => $product[0], 'price' => $product[1], 'image' => $product[2], 'category' => $category['name']]) }}" class="block rounded focus:outline-none focus:ring-2 focus:ring-[#f28b00]">
                            <div class="marketplace-product-image rounded bg-[#fafafa]"><img src="https://images.unsplash.com/{{ $product[2] }}?auto=format&fit=crop&w=500&q=80" alt="{{ $product[0] }}" class="transition duration-300 group-hover:scale-105"><span class="absolute right-2 top-2 rounded-full bg-[#444] px-2 py-1 text-[8px] text-white">New</span></div>
                            <h3 class="mt-3 min-h-8 text-[10px] leading-4 text-[#555]">{{ $product[0] }}</h3>
                            <p class="mt-2 text-[11px] font-bold text-[#777]">{{ $product[1] }}</p>
                        </a>
                        <div class="mt-2 flex items-center gap-3"><button type="button" class="grid h-7 w-7 place-items-center rounded-full bg-[#4a4a4a] text-sm text-white transition hover:bg-[#f28b00]" aria-label="Tambah {{ $product[0] }}" onclick="notify('{{ $product[0] }}')">&#128722;</button><span class="text-xs text-[#e5a400]">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
                    </article>
                    @endforeach
                </div>
            </div>
            @endforeach
        </section>

        <section id="tentang" class="mt-12 grid gap-4 border-t border-[#eee] py-8 text-xs text-[#777] sm:grid-cols-2">
            <div>
                <h2 class="font-bold text-[#444]">Tentang Kami</h2>
                <p class="mt-2 max-w-md leading-5">Nara Market menghadirkan kebutuhan keluarga dan pilihan produk terbaik dari toko terpercaya.</p>
            </div>
            <div id="kontak">
                <h2 class="font-bold text-[#444]">Kontak</h2>
                <p class="mt-2 leading-5">Bantuan belanja: halo@nara.market<br>Senin - Jumat, 09.00 - 17.00 WIB</p>
            </div>
        </section>
    </main>
    <button id="backToTop" type="button" aria-label="Kembali ke atas" class="fixed left-1/2 top-4 z-50 hidden h-12 w-12 -translate-x-1/2 items-center justify-center rounded-full bg-[#f28b00] text-xl font-bold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:bg-[#d97800]">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
            <path d="M12 18V6" />
            <path d="m6 12 6-6 6 6" />
        </svg>
    </button>
    <div id="notice" class="pointer-events-none fixed bottom-5 left-1/2 z-20 -translate-x-1/2 translate-y-4 rounded-full bg-[#444] px-5 py-3 text-xs font-semibold text-white opacity-0 shadow-xl transition-all" role="status"></div>
    <script>
        let activeCategory = 'semua';

        function toggleMobileMenu(forceState) {
            const menu = document.getElementById('mobile-navigation');
            const backdrop = document.getElementById('mobile-navigation-backdrop');
            const button = document.getElementById('mobile-menu-button');
            const isOpen = forceState === undefined ? !menu.classList.contains('is-open') : forceState;
            menu.classList.toggle('is-open', isOpen);
            backdrop.classList.toggle('is-open', isOpen);
            menu.setAttribute('aria-hidden', String(!isOpen));
            button.setAttribute('aria-expanded', String(isOpen));
            document.body.classList.toggle('overflow-hidden', isOpen);
        }

        function applyCategoryFilter() {
            const query = document.getElementById('product-search')?.value.toLowerCase() || '';
            const isSearching = query.trim().length > 0;

            const sectionsToHide = document.querySelectorAll('#toko, #produk, #kategori, #tentang, #kontak, .marketplace-banner, .brand-row, section[id="toko"], section[id="produk"], section[id="kategori"], section[id="tentang"], section[id="kontak"]');

            document.querySelectorAll('[data-category-section]').forEach((section) => {
                const sectionName = (section.dataset.categorySection || '').toLowerCase();
                const matchesCategory = activeCategory === 'semua' || sectionName === activeCategory;
                section.classList.toggle('hidden', !matchesCategory && !isSearching);
                section.classList.toggle('hidden', isSearching && !matchesCategory);
            });

            document.querySelectorAll('[data-product]').forEach((item) => {
                const product = (item.dataset.product || '').toLowerCase();
                const category = (item.dataset.category || '').toLowerCase();
                const matchesCategory = activeCategory === 'semua' || category === activeCategory;
                const matchesQuery = !query || product.includes(query) || category.includes(query);
                item.classList.toggle('hidden', !(matchesCategory && matchesQuery));
            });

            if (isSearching) {
                document.querySelectorAll('#toko, #tentang, #kontak, .marketplace-banner, #produk').forEach((el) => {
                    el.classList.add('hidden');
                });
                document.querySelectorAll('#kategori').forEach((el) => {
                    el.classList.remove('hidden');
                });
            } else {
                document.querySelectorAll('#toko, #tentang, #kontak, .marketplace-banner, #produk').forEach((el) => {
                    el.classList.remove('hidden');
                });
            }
        }

        function filterProducts(query) {
            const value = (query || '').toLowerCase();
            const searchInput = document.getElementById('product-search');
            if (searchInput) {
                searchInput.value = query;
            }
            applyCategoryFilter();
        }

        function setActiveCategory(category) {
            activeCategory = category;

            document.querySelectorAll('.category-tab').forEach((button) => {
                const isActive = button.dataset.category === category;
                button.classList.toggle('border-[#f28b00]', isActive);
                button.classList.toggle('text-[#f28b00]', isActive);
            });

            applyCategoryFilter();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const backToTopButton = document.getElementById('backToTop');

            const toggleBackToTop = () => {
                const shouldShow = window.scrollY > 200;
                backToTopButton.classList.toggle('hidden', !shouldShow);
                backToTopButton.classList.toggle('flex', shouldShow);
            };

            toggleBackToTop();
            window.addEventListener('scroll', toggleBackToTop);
            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            document.querySelectorAll('.category-tab').forEach((button) => {
                button.addEventListener('click', () => setActiveCategory(button.dataset.category));
            });
        });

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
