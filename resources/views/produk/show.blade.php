<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product['name'] }} | Sarai Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#fffdf9] text-[#444] antialiased">
    <header class="border-b border-[#e8e8e8] bg-white">
        <div class="mx-auto flex max-w-[1200px] items-center justify-between gap-4 px-4 py-4">
            <a href="{{ auth()->check() ? route('dashboard') : url('/') }}" class="text-2xl font-black tracking-[-0.08em] text-[#f28b00] sm:text-3xl">Sarai Market<span>.</span></a>
            @auth
            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="text-[11px] text-[#777] hover:text-[#f28b00]">Keluar</button></form>
            @else
            <a href="{{ route('login') }}" class="text-[11px] font-semibold text-[#f28b00]">Masuk</a>
            @endauth
        </div>
    </header>

    <main class="mx-auto max-w-[1000px] px-4 py-8 sm:px-6">
        <a href="{{ url()->previous() }}" class="text-[11px] font-semibold text-[#f28b00]">&lt; Kembali ke katalog</a>
        <section class="mt-5 grid gap-8 rounded-2xl border border-[#eee] bg-white p-5 shadow-sm sm:grid-cols-2 sm:p-8">
            <div class="overflow-hidden rounded-xl bg-[#fafafa]"><img src="https://images.unsplash.com/{{ $product['image'] }}?auto=format&fit=crop&w=900&q=85" alt="{{ $product['name'] }}" class="aspect-square w-full object-cover"></div>
            <div class="flex flex-col justify-center">
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#f28b00]">{{ $product['category'] }}</p>
                <h1 class="mt-3 text-2xl font-black leading-tight text-[#333] sm:text-3xl">{{ $product['name'] }}</h1>
                <p class="mt-5 text-2xl font-bold text-[#f28b00]">{{ $product['price'] }}</p>
                <div class="mt-5 border-y border-[#eee] py-4 text-xs leading-6 text-[#777]">
                    <p>{{ $product['description'] }}</p>
                    <p class="mt-2">Dikirim dari {{ $product['store'] }} dengan kemasan rapi ke seluruh Indonesia.</p>
                </div>
                <button type="button" class="mt-6 w-full rounded-lg bg-[#f28b00] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#d97800]" onclick="this.textContent = 'Ditambahkan ke keranjang'">Tambah ke keranjang</button>
            </div>
        </section>
    </main>
</body>

</html>
