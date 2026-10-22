<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Sarai Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f7f8fa] text-[#263238] antialiased">
    @php
    $stores = [
    ['name' => 'Walmart', 'icon' => '🛒', 'status' => 'Aktif', 'products' => [
    ['Goldenfi Strawberry Jam - 1kg', 'Rp 43.500', 'photo-1551024506-0bccd828d307'],
    ['Gerber Graduates Puff Sweet', 'Rp 57.000', 'photo-1551024709-8f23befc6f87'],
    ['Portable Lunch Box', 'Rp 68.000', 'photo-1495474472287-4d71bcdd2085'],
    ]],
    ['name' => 'Amazon', 'icon' => '📦', 'status' => 'Aktif', 'products' => [
    ['Bbox Bottle and Dispenser 240 ml', 'Rp 230.000', 'photo-1602143407151-7111542de6e8'],
    ['Bamboo Organizer Box', 'Rp 78.000', 'photo-1524758631624-e2822e304c36'],
    ['Daily Sunscreen', 'Rp 95.000', 'photo-1584839404042-8bcf6b8d3e8e'],
    ]],
    ['name' => 'DIY', 'icon' => '🛠️', 'status' => 'Aktif', 'products' => [
    ['Kitchen Storage Set', 'Rp 125.000', 'photo-1505693416388-ac5ce068fe85'],
    ['Mug Set Family', 'Rp 96.000', 'photo-1445116572660-236099ec97a0'],
    ['Bottle Warmer Premium', 'Rp 185.000', 'photo-1512436991641-6745cdb1723f'],
    ]],
    ['name' => 'Alibaba', 'icon' => '🌍', 'status' => 'Aktif', 'products' => [
    ['Goldenfi Tiramisu Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'],
    ['Little Palmerhaus Baby Bodysuits', 'Rp 55.000', 'photo-1519238263530-99bdd11df2ea'],
    ['Glow Serum Vitamin C', 'Rp 120.000', 'photo-1522335789203-aabd1fc54bc9'],
    ]],
    ['name' => 'Lainnya', 'icon' => '✨', 'status' => 'Aktif', 'products' => [
    ['Goldenfi Choco Crunchy - 1kg', 'Rp 43.500', 'photo-1578985545062-69928b1d9587'],
    ['Hydrating Face Mist', 'Rp 85.000', 'photo-1556228720-195a672e8a03'],
    ['Body Lotion Aloe', 'Rp 67.000', 'photo-1556228578-8c89e6adf883'],
    ]],
    ];
    $productCount = collect($stores)->sum(fn ($store) => count($store['products']));
    @endphp

    <div class="flex min-h-screen">
        <aside class="hidden w-64 shrink-0 border-r border-[#e5e8eb] bg-white lg:block">
            <div class="border-b border-[#eef0f2] px-6 py-5 text-xl font-black tracking-[-0.06em] text-[#f28b00]">Sarai Market<span>.</span></div>
            <div class="px-4 py-6">
                <p class="px-3 text-[10px] font-bold uppercase tracking-[0.16em] text-[#9aa3aa]">Menu Admin</p>
                <nav class="mt-3 space-y-1 text-sm">
                    <a href="{{ route('admin.index') }}" class="flex items-center gap-3 rounded-lg bg-[#fff4e5] px-3 py-2.5 font-semibold text-[#f28b00]">▦ <span>Ringkasan</span></a>
                    <a href="#penggunaan" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[#647078] hover:bg-[#f7f8fa]">▥ <span>Penggunaan Web</span></a>
                    <a href="#toko" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[#647078] hover:bg-[#f7f8fa]">▣ <span>Kelola Toko</span></a>
                    <a href="#produk" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-[#647078] hover:bg-[#f7f8fa]">□ <span>Kelola Produk</span></a>
                </nav>
                <div class="mt-10 border-t border-[#eef0f2] pt-5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#647078] hover:bg-[#f7f8fa]">← <span>Kembali ke toko</span></a>
                </div>
            </div>
        </aside>

        <main class="min-w-0 flex-1">
            <header class="flex items-center justify-between border-b border-[#e5e8eb] bg-white px-5 py-4 sm:px-8">
                <div>
                    <p class="text-xs text-[#8a959c]">Panel Admin</p>
                    <h1 class="mt-1 text-lg font-bold">Manajemen Toko & Produk</h1>
                </div>
                <div class="flex items-center gap-3"><span class="hidden text-xs text-[#6d777e] sm:block">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="text-xs font-semibold text-[#f28b00]">Keluar</button></form>
                </div>
            </header>

            <div class="mx-auto max-w-7xl px-5 py-7 sm:px-8">
                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="rounded-xl border border-[#e8ecef] bg-white p-5">
                        <p class="text-xs text-[#89949b]">Total Toko</p>
                        <p class="mt-2 text-2xl font-bold">{{ count($stores) }}</p>
                        <p class="mt-1 text-[11px] text-[#28a36a]">Semua aktif</p>
                    </div>
                    <div class="rounded-xl border border-[#e8ecef] bg-white p-5">
                        <p class="text-xs text-[#89949b]">Total Produk</p>
                        <p class="mt-2 text-2xl font-bold">{{ $productCount }}</p>
                        <p class="mt-1 text-[11px] text-[#28a36a]">Tersedia di katalog</p>
                    </div>
                    <div class="rounded-xl border border-[#e8ecef] bg-white p-5">
                        <p class="text-xs text-[#89949b]">Status Toko</p>
                        <p class="mt-2 text-2xl font-bold text-[#28a36a]">Aktif</p>
                        <p class="mt-1 text-[11px] text-[#89949b]">Operasional normal</p>
                    </div>
                </div>

                <section id="penggunaan" class="mt-6 rounded-xl border border-[#e8ecef] bg-white p-5 sm:p-6" aria-labelledby="usage-chart-title">
                    @php
                    $maxVisits = max(1, $usageChart->max('total'));
                    $periodLabels = ['daily' => 'Harian', 'weekly' => 'Mingguan', 'monthly' => 'Bulanan'];
                    $chartPoints = $usageChart->values()->map(function ($bucket, $index) use ($usageChart, $maxVisits) {
                    $x = 42 + ($index * 658 / max(1, $usageChart->count() - 1));
                    $y = 155 - (($bucket['total'] / $maxVisits) * 135);

                    return round($x, 1) . ',' . round($y, 1);
                    })->implode(' ');
                    @endphp
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <h2 id="usage-chart-title" class="text-base font-bold">Grafik Penggunaan Web</h2>
                            <p class="mt-1 text-xs text-[#89949b]">Jumlah kunjungan halaman yang berhasil, {{ strtolower($periodLabels[$period]) }}.</p>
                        </div>
                        <nav class="flex rounded-lg bg-[#f7f8fa] p-1" aria-label="Periode grafik penggunaan">
                            @foreach ($periodLabels as $key => $label)
                            <a href="{{ route('admin.index', ['periode' => $key]) }}" @class(['rounded-md px-3 py-2 text-[11px] font-semibold', 'bg-white text-[#f28b00] shadow-sm'=> $period === $key, 'text-[#647078] hover:text-[#f28b00]' => $period !== $key]) @if ($period === $key) aria-current="page" @endif>{{ $label }}</a>
                            @endforeach
                        </nav>
                    </div>
                    <p class="mt-5 text-sm font-bold">{{ number_format($usageChart->sum('total')) }} kunjungan</p>
                    <div class="mt-4 overflow-x-auto">
                        <svg class="h-56 min-w-[580px] w-full" viewBox="0 0 720 205" role="img" aria-label="Grafik garis penggunaan web {{ strtolower($periodLabels[$period]) }}">
                            <g fill="none" stroke="#aeb5ba" stroke-width="1">
                                <line x1="42" y1="20" x2="700" y2="20" />
                                <line x1="42" y1="65" x2="700" y2="65" />
                                <line x1="42" y1="110" x2="700" y2="110" />
                                <line x1="42" y1="155" x2="700" y2="155" />
                            </g>
                            <g fill="#89949b" font-size="10" text-anchor="end">
                                <text x="35" y="23">{{ $maxVisits }}</text>
                                <text x="35" y="68">{{ (int) round($maxVisits * 2 / 3) }}</text>
                                <text x="35" y="113">{{ (int) round($maxVisits / 3) }}</text>
                                <text x="35" y="158">0</text>
                            </g>
                            <polyline points="{{ $chartPoints }}" fill="none" stroke="#4b83bd" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            @foreach ($usageChart as $index => $bucket)
                            @php
                            $x = 42 + ($index * 658 / max(1, $usageChart->count() - 1));
                            $y = 155 - (($bucket['total'] / $maxVisits) * 135);
                            @endphp
                            <circle cx="{{ round($x, 1) }}" cy="{{ round($y, 1) }}" r="3" fill="#4b83bd">
                                <title>{{ $bucket['label'] }}: {{ $bucket['total'] }} kunjungan</title>
                            </circle>
                            <text x="{{ round($x, 1) }}" y="181" fill="#89949b" font-size="9" text-anchor="middle">{{ $bucket['label'] }}</text>
                            @endforeach
                        </svg>
                    </div>
                </section>

                <section id="toko" class="mt-8">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold">Daftar Toko</h2>
                            <p class="mt-1 text-xs text-[#89949b]">Kelola toko yang tampil di marketplace.</p>
                        </div><button type="button" class="rounded-lg bg-[#f28b00] px-4 py-2 text-xs font-bold text-white hover:bg-[#d97800]">+ Tambah Toko</button>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach ($stores as $store)
                        <article class="rounded-xl border border-[#e8ecef] bg-white p-5">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center gap-3"><span class="grid h-10 w-10 place-items-center rounded-lg bg-[#f7f8fa] text-xl">{{ $store['icon'] }}</span>
                                    <div>
                                        <h3 class="text-sm font-bold">{{ $store['name'] }}</h3>
                                        <p class="mt-1 text-[11px] text-[#89949b]">{{ count($store['products']) }} produk</p>
                                    </div>
                                </div><span class="rounded-full bg-[#eaf8f0] px-2 py-1 text-[10px] font-semibold text-[#24935d]">{{ $store['status'] }}</span>
                            </div>
                            <div class="mt-5 flex gap-2"><button type="button" class="flex-1 rounded-lg border border-[#e3e7e9] py-2 text-[11px] font-semibold text-[#5d686f] hover:border-[#f28b00] hover:text-[#f28b00]">Edit Toko</button><a href="#produk" class="flex-1 rounded-lg bg-[#f7f8fa] py-2 text-center text-[11px] font-semibold text-[#5d686f] hover:text-[#f28b00]">Lihat Produk</a></div>
                        </article>
                        @endforeach
                    </div>
                </section>

                <section id="produk" class="mt-8 rounded-xl border border-[#e8ecef] bg-white">
                    <div class="flex items-center justify-between border-b border-[#eef0f2] px-5 py-4">
                        <div>
                            <h2 class="text-base font-bold">Produk yang Dijual</h2>
                            <p class="mt-1 text-xs text-[#89949b]">Daftar produk berdasarkan toko.</p>
                        </div><button type="button" class="rounded-lg bg-[#f28b00] px-4 py-2 text-xs font-bold text-white hover:bg-[#d97800]">+ Tambah Produk</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[680px] text-left text-xs">
                            <thead class="bg-[#fafbfc] text-[10px] uppercase tracking-wide text-[#89949b]">
                                <tr>
                                    <th class="px-5 py-3 font-semibold">Produk</th>
                                    <th class="px-5 py-3 font-semibold">Toko</th>
                                    <th class="px-5 py-3 font-semibold">Harga</th>
                                    <th class="px-5 py-3 font-semibold">Status</th>
                                    <th class="px-5 py-3 font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#eef0f2]">@foreach ($stores as $store) @foreach ($store['products'] as $product)<tr class="hover:bg-[#fffdfa]">
                                    <td class="px-5 py-3">
                                        <a href="{{ route('product.show', ['slug' => Illuminate\Support\Str::slug($product[0]), 'name' => $product[0], 'price' => $product[1], 'image' => $product[2], 'store' => $store['name']]) }}" class="flex items-center gap-3 rounded focus:outline-none focus:ring-2 focus:ring-[#f28b00]"><img src="https://images.unsplash.com/{{ $product[2] }}?auto=format&fit=crop&w=100&q=80" alt="{{ $product[0] }}" class="h-9 w-9 rounded object-cover"><span class="font-semibold text-[#455057] hover:text-[#f28b00]">{{ $product[0] }}</span></a>
                                    </td>
                                    <td class="px-5 py-3 text-[#69757c]">{{ $store['name'] }}</td>
                                    <td class="px-5 py-3 font-semibold">{{ $product[1] }}</td>
                                    <td class="px-5 py-3"><span class="rounded-full bg-[#eaf8f0] px-2 py-1 text-[10px] font-semibold text-[#24935d]">Tersedia</span></td>
                                    <td class="px-5 py-3"><button type="button" class="text-[11px] font-semibold text-[#f28b00]">Edit</button></td>
                                </tr>@endforeach @endforeach</tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

</html>
