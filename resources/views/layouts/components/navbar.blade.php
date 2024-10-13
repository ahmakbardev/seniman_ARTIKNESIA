<header class="shadow-md sticky top-0 z-50">
    <nav class="nav-info py-2 bg-owngray justify-end px-5 hidden md:flex">
        <ul class="flex gap-6 text-xs text-navInfoGray">
            <li>Tentang Artiknesia</li>
            <li>Seniman</li>
            <li>Blog</li>
            <li>Promo</li>
        </ul>
    </nav>
    <nav class="px-5 py-4 flex gap-10 h-fit justify-between lg:items-center bg-white">
        <img class="flex-none" src="{{ asset('assets/images/logo/artiknesia.svg') }}" alt="">
        <ul class="md:flex hidden  flex-1 gap-8 justify-center items-center">
            <li class="text-sm"><a href="#beranda" class="underline-animation">Beranda</a></li>
            <li class="text-sm"><a href="#benefit" class="underline-animation">Benefit</a></li>
            <li class="text-sm"><a href="#promo" class="underline-animation">Promo</a></li>
            <li class="text-sm"><a href="#testimoni" class="underline-animation">Testimoni</a></li>
        </ul>
        <div class="hidden sm:flex">
            <ul class="flex items-center gap-3 ml-3 flex-none">
                <li><a href="{{ route('login') }}" class="btn-color-outline py-1 px-3 rounded-md text-sm">Masuk</a></li>
                <li><a href="{{ route('register') }}" class="btn-color-fill py-1 px-3 rounded-md text-sm">Daftar</a></li>
            </ul>
        </div>
        @include('layouts.components.mobile.navbar')
    </nav>
</header>
