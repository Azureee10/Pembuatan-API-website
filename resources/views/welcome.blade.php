<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nara Market - pilihan barang cantik untuk rumah dan keseharian.">
    <title>Sarai Market | Belanja dengan rasa Penuh SukaCita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="bg-[#17221c] px-4 py-2 text-center text-xs font-semibold tracking-[0.16em] text-[#f8f3e7]">
        GRATIS ONGKIR UNTUK PESANAN DI ATAS RP500.000
    </div>

    <header class="border-b border-[#17221c]/10 bg-[#f7f5ef]/95">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-5 lg:px-8">
            <a href="{{ url('/') }}" class="font-display text-2xl font-bold tracking-tight text-[#17221c]">Sarai Market<span class="text-[#c76a45]">.</span></a>
            <nav class="hidden items-center gap-8 text-sm font-semibold text-[#4c594f] md:flex" aria-label="Navigasi utama">
                <a href="#koleksi" class="transition hover:text-[#c76a45]">Koleksi</a>
                <a href="#terlaris" class="transition hover:text-[#c76a45]">Terlaris</a>
                <a href="#cerita" class="transition hover:text-[#c76a45]">Cerita kami</a>
            </nav>
            <div class="flex items-center gap-2">
                <label class="hidden items-center gap-2 rounded-full border border-[#17221c]/10 bg-white/60 px-4 py-2 text-[#657066] lg:flex">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="11" cy="11" r="6.5" />
                        <path d="m16 16 4.5 4.5" />
                    </svg>
                    <input id="search" type="search" placeholder="Cari produk" class="w-28 border-0 bg-transparent p-0 text-sm text-[#17221c] outline-none placeholder:text-[#657066] focus:ring-0">
                </label>
                <button type="button" class="grid h-10 w-10 place-items-center rounded-full border border-[#17221c]/10 text-[#17221c] transition hover:border-[#c76a45] hover:text-[#c76a45] lg:hidden" aria-label="Cari produk" onclick="document.getElementById('search').focus()">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="11" cy="11" r="6.5" />
                        <path d="m16 16 4.5 4.5" />
                    </svg>
                </button>
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="hidden px-3 text-sm font-semibold text-[#4c594f] sm:block">Akun</a>
                @else
                <a href="{{ route('login') }}" class="hidden px-3 text-sm font-semibold text-[#4c594f] sm:block">Masuk</a>
                @endauth
                @endif
                <button type="button" class="relative grid h-10 w-10 place-items-center rounded-full bg-[#e8b34f] text-[#17221c] transition hover:bg-[#d89d31]" aria-label="Buka keranjang" onclick="toggleCart()">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M3.5 5.5h2l1.6 10h10.8l2-7.5H6.3" />
                        <circle cx="9" cy="19" r="1" />
                        <circle cx="17" cy="19" r="1" />
                    </svg>
                    <span id="cart-count" class="absolute -right-1 -top-1 hidden min-w-5 rounded-full bg-[#c76a45] px-1 text-[10px] font-bold leading-5 text-white">0</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section class="mx-auto grid max-w-7xl gap-8 px-5 pb-20 pt-12 lg:grid-cols-[1fr_0.92fr] lg:items-center lg:px-8 lg:pt-20">
            <div class="max-w-xl">
                <p class="mb-5 text-xs font-bold uppercase tracking-[0.22em] text-[#c76a45]">Musim baru, suasana baru</p>
                <h1 class="font-display text-5xl leading-[1.04] tracking-tight text-[#17221c] sm:text-6xl lg:text-7xl">Benda baik untuk <em class="font-normal text-[#c76a45]">hidup</em> yang lebih indah.</h1>
                <p class="mt-6 max-w-md text-base leading-7 text-[#657066]">Temukan pilihan home goods, busana, dan hadiah yang dibuat dengan perhatian untuk menemani hari-hari Anda.</p>
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <button type="button" class="inline-flex items-center gap-3 rounded-full bg-[#17221c] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#c76a45]" onclick="openAuthChoice()">Jelajahi koleksi <span aria-hidden="true">&#8594;</span></button>
                    <a href="#cerita" class="text-sm font-bold text-[#17221c] underline decoration-[#e8b34f] decoration-2 underline-offset-8">Kenali Nara</a>
                </div>
                <div class="mt-12 flex gap-10 border-t border-[#17221c]/10 pt-5 text-sm text-[#657066]"><span><strong class="block text-xl text-[#17221c]">2k+</strong> pelanggan bahagia</span><span><strong class="block text-xl text-[#17221c]">48 jam</strong> pengiriman cepat</span></div>
            </div>
            <div class="relative min-h-[430px] overflow-hidden rounded-[2rem] bg-[#d9dfd0] shadow-[0_24px_50px_rgba(23,34,28,0.12)] sm:min-h-[520px]">
                <img src="https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?auto=format&fit=crop&w=1100&q=85" alt="Koleksi pakaian netral di dalam butik" class="absolute inset-0 h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#17221c]/55 via-transparent to-transparent"></div>
                <div class="absolute bottom-7 left-7 text-white">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#f5cc7a]">Edit pilihan</p>
                    <p class="mt-2 font-display text-3xl">Soft essentials</p>
                </div>
                <span class="absolute right-6 top-6 grid h-16 w-16 rotate-12 place-items-center rounded-full bg-[#e8b34f] text-center text-[10px] font-bold uppercase leading-3 text-[#17221c]">Baru<br>hadir</span>
            </div>
        </section>

        @if (false)
        <section id="koleksi" class="border-y border-[#17221c]/10 bg-[#ece9df]">
            <div class="mx-auto max-w-7xl px-5 py-12 lg:px-8">
                <div class="mb-7 flex items-end justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c76a45]">Pilih suasanamu</p>
                        <h2 class="mt-2 font-display text-3xl text-[#17221c]">Belanja berdasarkan kategori</h2>
                    </div><a href="#terlaris" class="hidden text-sm font-bold text-[#17221c] sm:block">Lihat semua &#8594;</a>
                </div>
                <div class="grid grid-cols-2 gap-3 md:grid-cols-4 md:gap-5"><a href="#terlaris" class="group relative h-40 overflow-hidden rounded-2xl bg-[#a8b6a2] p-5 sm:h-52"><img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=500&q=80" alt="Busana sehari-hari" class="absolute inset-0 h-full w-full object-cover mix-blend-multiply opacity-70 transition duration-500 group-hover:scale-105"><span class="absolute bottom-5 left-5 font-display text-xl text-white">Pakaian</span></a><a href="#terlaris" class="group relative h-40 overflow-hidden rounded-2xl bg-[#d3ad88] p-5 sm:h-52"><img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=500&q=80" alt="Dekorasi rumah" class="absolute inset-0 h-full w-full object-cover mix-blend-multiply opacity-75 transition duration-500 group-hover:scale-105"><span class="absolute bottom-5 left-5 font-display text-xl text-white">Untuk rumah</span></a><a href="#terlaris" class="group relative h-40 overflow-hidden rounded-2xl bg-[#d3c5b4] p-5 sm:h-52"><img src="https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=500&q=80" alt="Parfum dan wewangian" class="absolute inset-0 h-full w-full object-cover mix-blend-multiply opacity-75 transition duration-500 group-hover:scale-105"><span class="absolute bottom-5 left-5 font-display text-xl text-white">Wewangian</span></a><a href="#terlaris" class="group relative h-40 overflow-hidden rounded-2xl bg-[#bdc7b5] p-5 sm:h-52"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80" alt="Koleksi sepatu" class="absolute inset-0 h-full w-full object-cover mix-blend-multiply opacity-70 transition duration-500 group-hover:scale-105"><span class="absolute bottom-5 left-5 font-display text-xl text-white">Aksesori</span></a></div>
            </div>
        </section>

        <section id="terlaris" class="mx-auto max-w-7xl px-5 py-20 lg:px-8">
            <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c76a45]">Kurasi minggu ini</p>
                    <h2 class="mt-2 font-display text-4xl text-[#17221c]">Yang paling disukai</h2>
                </div>
                <div class="flex gap-2 text-sm"><button class="rounded-full bg-[#17221c] px-4 py-2 font-semibold text-white">Semua</button><button class="rounded-full border border-[#17221c]/15 px-4 py-2 font-semibold text-[#657066] transition hover:border-[#c76a45] hover:text-[#c76a45]">Baru</button></div>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug('Lampu meja Arco'), 'name' => 'Lampu meja Arco', 'price' => 'Rp489.000', 'image' => 'photo-1586023492125-27b2c045efd7', 'category' => 'Untuk rumah']) }}" class="product-card group block">
                    <div class="relative overflow-hidden rounded-2xl bg-[#e7d9ca]"><img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=700&q=85" alt="Lampu meja Arco" class="aspect-[4/5] w-full object-cover"><span class="absolute left-3 top-3 rounded-full bg-white/90 px-3 py-1 text-[10px] font-bold uppercase tracking-wider">Pilihan editor</span><button class="absolute bottom-3 right-3 grid h-11 w-11 translate-y-2 place-items-center rounded-full bg-[#e8b34f] text-[#17221c] opacity-0 transition group-hover:translate-y-0 group-hover:opacity-100" aria-label="Tambah Lampu meja Arco ke keranjang" onclick="addToCart('Lampu meja Arco')">+</button></div>
                    <div class="pt-4">
                        <h3 class="font-semibold">Lampu meja Arco</h3>
                        <p class="mt-1 text-sm text-[#657066]">Rp489.000</p>
                    </div>
                </a>
                <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug('Jaket linen Sora'), 'name' => 'Jaket linen Sora', 'price' => 'Rp799.000', 'image' => 'photo-1551028719-00167b16eac5', 'category' => 'Pakaian']) }}" class="product-card group block">
                    <div class="relative overflow-hidden rounded-2xl bg-[#cbd3c3]"><img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=700&q=85" alt="Jaket linen Sora" class="aspect-[4/5] w-full object-cover"><button class="absolute bottom-3 right-3 grid h-11 w-11 translate-y-2 place-items-center rounded-full bg-[#e8b34f] text-[#17221c] opacity-0 transition group-hover:translate-y-0 group-hover:opacity-100" aria-label="Tambah Jaket linen Sora ke keranjang" onclick="addToCart('Jaket linen Sora')">+</button></div>
                    <div class="pt-4">
                        <h3 class="font-semibold">Jaket linen Sora</h3>
                        <p class="mt-1 text-sm text-[#657066]">Rp799.000</p>
                    </div>
                </a>
                <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug('Eau de parfum Hujan'), 'name' => 'Eau de parfum Hujan', 'price' => 'Rp359.000', 'image' => 'photo-1541643600914-78b084683601', 'category' => 'Wewangian']) }}" class="product-card group block">
                    <div class="relative overflow-hidden rounded-2xl bg-[#e3d4c6]"><img src="https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=700&q=85" alt="Eau de parfum Hujan" class="aspect-[4/5] w-full object-cover"><span class="absolute left-3 top-3 rounded-full bg-[#c76a45] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-white">-20%</span><button class="absolute bottom-3 right-3 grid h-11 w-11 translate-y-2 place-items-center rounded-full bg-[#e8b34f] text-[#17221c] opacity-0 transition group-hover:translate-y-0 group-hover:opacity-100" aria-label="Tambah Eau de parfum Hujan ke keranjang" onclick="addToCart('Eau de parfum Hujan')">+</button></div>
                    <div class="pt-4">
                        <h3 class="font-semibold">Eau de parfum Hujan</h3>
                        <p class="mt-1 text-sm text-[#657066]"><span class="font-semibold text-[#17221c]">Rp359.000</span> <s class="ml-1 text-xs">Rp449.000</s></p>
                    </div>
                </a>
                <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug('Sneakers Kanso'), 'name' => 'Sneakers Kanso', 'price' => 'Rp649.000', 'image' => 'photo-1542291026-7eec264c27ff', 'category' => 'Aksesori']) }}" class="product-card group block">
                    <div class="relative overflow-hidden rounded-2xl bg-[#d8d6c9]"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=700&q=85" alt="Sneakers Kanso" class="aspect-[4/5] w-full object-cover"><button class="absolute bottom-3 right-3 grid h-11 w-11 translate-y-2 place-items-center rounded-full bg-[#e8b34f] text-[#17221c] opacity-0 transition group-hover:translate-y-0 group-hover:opacity-100" aria-label="Tambah Sneakers Kanso ke keranjang" onclick="addToCart('Sneakers Kanso')">+</button></div>
                    <div class="pt-4">
                        <h3 class="font-semibold">Sneakers Kanso</h3>
                        <p class="mt-1 text-sm text-[#657066]">Rp649.000</p>
                    </div>
                </a>
            </div>
        </section>

        <section id="cerita" class="bg-[#dce2d6]">
            <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-16 lg:grid-cols-2 lg:px-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c76a45]">Sedikit tentang kami</p>
                    <h2 class="mt-3 max-w-lg font-display text-4xl leading-tight text-[#17221c]">Kami percaya barang sehari-hari boleh terasa istimewa.</h2>
                    <p class="mt-5 max-w-lg leading-7 text-[#657066]">Nara memilih produk dari pembuat yang peduli pada material, proses, dan umur panjang. Karena rumah yang baik dimulai dari benda-benda yang punya cerita.</p><a href="#koleksi" class="mt-7 inline-flex rounded-full border border-[#17221c] px-5 py-3 text-sm font-bold text-[#17221c] transition hover:bg-[#17221c] hover:text-white">Baca cerita kami &#8594;</a>
                </div>
                <div class="grid grid-cols-2 gap-3"><img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=600&q=80" alt="Ruang kerja yang tenang" class="mt-8 h-52 w-full rounded-2xl object-cover"><img src="https://images.unsplash.com/photo-1556228578-8c89e6adf883?auto=format&fit=crop&w=600&q=80" alt="Produk perawatan pilihan" class="h-52 w-full rounded-2xl object-cover"></div>
            </div>
        </section>
    </main>

    @endif

    <footer class="bg-[#17221c] px-5 py-10 text-[#f8f3e7] lg:px-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="font-display text-2xl">nara<span class="text-[#e8b34f]">.</span></p>
                <p class="mt-1 text-sm text-white/60">Barang baik, hari yang lebih baik.</p>
            </div>
            <p class="text-xs text-white/50">© {{ date('Y') }} Nara Market. Dibuat dengan perhatian.</p>
        </div>
    </footer>

    <div id="cart-toast" class="pointer-events-none fixed bottom-5 left-1/2 z-20 -translate-x-1/2 translate-y-4 rounded-full bg-[#17221c] px-5 py-3 text-sm font-semibold text-white opacity-0 shadow-xl transition-all" role="status"></div>

    <div id="auth-choice" class="auth-choice-overlay" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="auth-choice-title" onclick="closeAuthChoice(event)">
        <div class="auth-choice-panel" onclick="event.stopPropagation()">
            <div class="flex items-start justify-between gap-5">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c76a45]">Mulai berbelanja</p>
                    <h2 id="auth-choice-title" class="mt-2 font-display text-3xl text-[#17221c]">Pilih cara masuk</h2>
                    <p class="mt-2 text-sm leading-6 text-[#657066]">Masuk ke akun Anda atau buat akun baru untuk menjelajahi koleksi.</p>
                </div>
                <button type="button" class="grid h-9 w-9 shrink-0 place-items-center rounded-full border border-[#17221c]/10 text-xl text-[#657066] transition hover:border-[#c76a45] hover:text-[#c76a45]" aria-label="Tutup pilihan masuk" onclick="closeAuthChoice()">&times;</button>
            </div>
            <div class="mt-7 grid gap-3 sm:grid-cols-2">
                <a href="{{ route('login') }}" class="rounded-2xl bg-[#17221c] px-5 py-4 text-center text-sm font-bold text-white transition hover:bg-[#c76a45]">Masuk</a>
                <a href="{{ route('register') }}" class="rounded-2xl border border-[#17221c]/20 px-5 py-4 text-center text-sm font-bold text-[#17221c] transition hover:border-[#c76a45] hover:text-[#c76a45]">Daftar</a>
            </div>
        </div>
    </div>

    <script>
        let cartCount = 0;

        function openAuthChoice() {
            const modal = document.getElementById('auth-choice');
            modal.classList.add('is-open');
            modal.style.display = 'flex';
            document.body.classList.add('overflow-hidden');
        }

        function closeAuthChoice(event) {
            if (event && event.target !== event.currentTarget) return;

            const modal = document.getElementById('auth-choice');
            modal.classList.remove('is-open');
            modal.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeAuthChoice();
        });

        function addToCart(name) {
            cartCount += 1;
            const badge = document.getElementById('cart-count');
            const toast = document.getElementById('cart-toast');
            badge.textContent = cartCount;
            badge.classList.remove('hidden');
            toast.textContent = name + ' ditambahkan ke keranjang';
            toast.classList.remove('translate-y-4', 'opacity-0');
            window.clearTimeout(window.cartToastTimer);
            window.cartToastTimer = window.setTimeout(() => toast.classList.add('translate-y-4', 'opacity-0'), 2200);
        }

        function toggleCart() {
            const toast = document.getElementById('cart-toast');
            toast.textContent = cartCount ? cartCount + ' produk ada di keranjang Anda' : 'Keranjang Anda masih kosong';
            toast.classList.remove('translate-y-4', 'opacity-0');
            window.clearTimeout(window.cartToastTimer);
            window.cartToastTimer = window.setTimeout(() => toast.classList.add('translate-y-4', 'opacity-0'), 2200);
        }
    </script>
</body>

</html>
