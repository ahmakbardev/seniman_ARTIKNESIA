<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAFTAR ARTIKNESIA</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo-square.png') }}"/>

    @include('layouts.components.styles')
    <!-- Choices.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    @livewireStyles


</head>

<body class="antialiased box-border p-5 bg-white font-montserrat grid md:grid-cols-2 gap-10 *:rounded-xl">
<div class="relative md:sticky top-3 bg-[url('/assets/images/login/banner.png')] bg-cover bg-top h-32 md:h-screen">
    <div class="absolute top-3 left-3 flex gap-4 items-center">
        <a href="{{ url('/') }}"
           class="bg-white border border-white grid place-items-center aspect-square rounded-full w-10"><i
                    class="fa-solid fa-arrow-left"></i></a>
        <p class="text-sm font font-semibold text-white">Kembali ke Beranda</p>
    </div>
</div>

<div class="relative flex justify-center items-center">
    <div class="max-w-screen-sm flex flex-col h-fit justify-center px-7 py-10 border rounded-xl">
        <h1 class="text-3xl font-bold">Selamat Datang <br> di ARTIKNESIA</h1>
        <h4 class="text-lg">Segera daftar menjadi seniman ARTIKNESIA.</h4>
        @livewire('register-form')
        <p class="text-sm">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-500">
                Login disini!
            </a>
        </p>
    </div>
</div>
<!-- Choices.js JavaScript -->
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</body>

</html>
