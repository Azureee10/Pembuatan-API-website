<nav x-data="{ open: false }" class="border-b border-[#17221c]/10 bg-[#f7f5ef]">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-4 lg:px-8">
        <a href="{{ route('dashboard') }}" class="font-display text-2xl font-bold tracking-tight text-[#17221c]">nara<span class="text-[#c76a45]">.</span></a>
        <div class="hidden items-center gap-7 text-sm font-semibold text-[#4c594f] lg:flex">
            <a href="{{ route('dashboard') }}" class="text-[#c76a45]">Dashboard</a>
            <a href="{{ route('dashboard') }}#kategori" class="transition hover:text-[#c76a45]">Kategori Produk</a>
            <a href="{{ route('dashboard') }}#toko" class="transition hover:text-[#c76a45]">Toko</a>
            <a href="{{ route('dashboard') }}#tentang" class="transition hover:text-[#c76a45]">Tentang Kami</a>
            <a href="{{ route('dashboard') }}#kontak" class="transition hover:text-[#c76a45]">Kontak</a>
        </div>
        <div class="hidden items-center gap-3 sm:flex">
            <span class="text-sm font-semibold text-[#4c594f]">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-full border border-[#17221c]/15 px-4 py-2 text-xs font-bold text-[#17221c] transition hover:border-[#c76a45] hover:text-[#c76a45]">Keluar</button>
            </form>
        </div>
        <button @click="open = !open" type="button" class="rounded-full border border-[#17221c]/15 p-2 lg:hidden" aria-label="Buka menu"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
    </div>
    <div x-show="open" x-cloak class="border-t border-[#17221c]/10 px-5 py-4 lg:hidden">
        <div class="flex flex-col gap-4 text-sm font-semibold"><a href="{{ route('dashboard') }}">Dashboard</a><a href="{{ route('dashboard') }}#kategori">Kategori Produk</a><a href="{{ route('dashboard') }}#toko">Toko</a><a href="{{ route('dashboard') }}#tentang">Tentang Kami</a><a href="{{ route('dashboard') }}#kontak">Kontak</a></div>
        <form method="POST" action="{{ route('logout') }}" class="mt-4">@csrf<button type="submit" class="text-sm font-bold text-[#c76a45]">Keluar</button></form>
    </div>
</nav>
