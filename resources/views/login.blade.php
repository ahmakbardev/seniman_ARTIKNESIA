<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN ARTIKNESIA</title>
    @include('layouts.components.styles')
    @livewireStyles
</head>

<body
    class="antialiased box-border p-5 bg-white font-montserrat grid md:grid-cols-2 h-screen gap-1 md:gap-10 *:rounded-xl">
    <div class="relative flex justify-center 2xs:max-xs:h-fit items-center md:order-1 order-2">
        <div class="absolute hidden md:top-3 md:left-3 md:flex gap-4 items-center">
            <a href="{{ url('/') }}" class="border grid place-items-center aspect-square rounded-full w-10"><i
                    class="fa-solid fa-arrow-left"></i>
            </a>
            <p class="text-sm font font-semibold">Kembali ke Beranda</p>
        </div>
        <div class="max-w-screen-xs flex flex-col h-fit justify-center px-7 py-10 border rounded-xl">
            <h1 class="text-3xl font-bold">Selamat Datang <br> Seniman</h1>
            <h4 class="text-lg">Login ke akun kamu disini.</h4>
            @livewire('login')
            <p class="text-sm">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-500">
                    Daftar disini!
                </a>
            </p>
        </div>
    </div>
    <div class="relative bg-[url('/assets/images/login/banner.png')] order-1 2xs:max-xs:h-36 md:order-2 bg-cover bg-top">
        <div class="absolute md:hidden top-3 left-3 flex  gap-4 items-center">
            <a href="{{ url('/') }}" class="border grid place-items-center aspect-square rounded-full bg-white w-10"><i
                    class="fa-solid fa-arrow-left"></i>
            </a>
            <p class="text-sm font font-semibold text-white">Kembali ke Beranda</p>
        </div>
    </div>
    @livewireScripts
</body>

</html>
