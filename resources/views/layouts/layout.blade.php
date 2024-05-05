<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARTIKNESIA</title>
@include('layouts.components.styles')
    @livewireStyles

</head>

<body class="antialiased font-montserrat box-border">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @include('layouts.components.navbar')

    <main class="px-3 lg:px-10 py-5">
        @yield('content')
    </main>

    @include('layouts.components.footer')
    @livewireScripts
</body>

</html>
