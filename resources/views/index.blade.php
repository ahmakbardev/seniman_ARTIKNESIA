@extends('layouts.layout')

@section('content')
    <div id="beranda"
        class="banner relative flex items-center w-full h-96 md:h-[300px] lg:h-[400px] xl:h-[500px] bg-[url('/assets/images/banner/container-banner.png')] bg-no-repeat bg-cover rounded-xl bg-primary">
        <div class="left lg:w-1/2 px-5 xl:px-20">
            <h1 class="text-3xl md:text-4xl lg:text-7xl font-bold">SENIMAN ARTIKNESIA</h1>
            <h4 class="text-base font-semibold">Yuk, Tunjukkan Bakatmu, Bagikan Karya Senimu dengan Dunia!
                Daftar Sekarang dan Mulailah Petualangan Senimu!</h4>
            <a href="{{ route('register') }}" class="btn-color-fill-white mt-5 py-2 px-20 rounded-xl font-semibold">Daftar
                Sekarang</a>
        </div>
        <div class="absolute hidden lg:inline-block  h-3/4 xl:h-full -right-5 bottom-0">
            <img class="filter h-full object-contain" src="{{ asset('assets/images/banner/persons.png') }}" alt="">
        </div>
    </div>
    <div id="benefit" class="py-20 xl:px-10">
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl md:text-4xl font-semibold">Spesial untuk Seniman ARTIKNESIA</h1>
            <h4 class="text-base font-semibold">Yuk, Tunjukkan Bakatmu, Bagikan Karya Senimu dengan Dunia!
                Daftar Sekarang dan Mulailah Petualangan Senimu!</h4>
        </div>
        <div class="special-container my-5 grid md:grid-cols-2 lg:grid-cols-4 gap-5 *:rounded-md *:border *:p-3">
            <div class="card-spesial flex flex-col gap-5 justify-center items-center">
                <div class="w-40" id="animation container">
                    <script>
                        var animation = bodymovin.loadAnimation({
                            container: document.getElementById('animation container'),
                            path: '{{ asset('assets/animations/animation.json') }}',
                            render: 'svg',
                            loop: true,
                            autoplay: true,
                            name: 'intro'
                        });
                    </script>
                </div>
                <h1 class="text-2xl font-semibold">Jual Karya</h1>
            </div>
            <div class="card-spesial flex flex-col gap-5 justify-center items-center overflow-hidden">
                <div class="w-52" id="animation container2">
                    <script>
                        var animation = bodymovin.loadAnimation({
                            container: document.getElementById('animation container2'),
                            path: '{{ asset('assets/animations/animation-custom-art2.json') }}',
                            render: 'svg',
                            loop: true,
                            autoplay: true,
                            name: 'intro'
                        });
                    </script>
                </div>
                <h1 class="text-2xl font-semibold text-center">Custom Art Project</h1>
            </div>
            <div class="card-spesial flex flex-col gap-5 justify-center items-center">
                <div class="w-40" id="animation container3">
                    <script>
                        var animation = bodymovin.loadAnimation({
                            container: document.getElementById('animation container3'),
                            path: '{{ asset('assets/animations/animation-community.json') }}',
                            render: 'svg',
                            loop: true,
                            autoplay: true,
                            name: 'intro'
                        });
                    </script>
                </div>
                <h1 class="text-2xl font-semibold">Community</h1>
            </div>
            <div class="card-spesial flex flex-col gap-5 justify-center items-center">
                <div class="w-40" id="animation container4">
                    <script>
                        var animation = bodymovin.loadAnimation({
                            container: document.getElementById('animation container4'),
                            path: '{{ asset('assets/animations/animation-exhibition.json') }}',
                            render: 'svg',
                            loop: true,
                            autoplay: true,
                            name: 'intro'
                        });
                    </script>
                </div>
                <h1 class="text-2xl font-semibold">Pameran</h1>
            </div>
        </div>
    </div>
    <div class="py-10 flex flex-col justify-center items-center">
        <div class="w-3/4 text-center flex flex-col justify-center items-center">
            <h1 class="text-4xl font-semibold">Pencapaian ARTIKNESIA</h1>
            <div class="w-full grid *:my-5 md:grid-cols-3 my-10">
                <div class="flex flex-col gap-3 text-center">
                    <h1 class="text-5xl font-extrabold text-primary">100+</h1>
                    <h1 class="text-2xl font-bold text-primary-darker">ARTIST</h1>
                </div>
                <div class="flex flex-col gap-3 text-center">
                    <h1 class="text-5xl font-extrabold text-primary">100+</h1>
                    <h1 class="text-2xl font-bold text-primary-darker">ARTWORK</h1>
                </div>
                <div class="flex flex-col gap-3 text-center">
                    <h1 class="text-5xl font-extrabold text-primary">10+</h1>
                    <h1 class="text-2xl font-bold text-primary-darker">PROJECT</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="promo" class="py-5 lg:py-20 flex flex-col justify-center items-center">
        <div class="2xl:w-3/4 text-center flex flex-col justify-center items-center">
            <h1 class="text-4xl font-semibold">Tunggu apalagi? Yuk, Daftar Sekarang!</h1>
            <div class="w-full grid lg:grid-cols-3 gap-3 my-10 *:rounded-lg *:border *:border-primary">
                <div class="flex flex-col gap-3 px-8 py-5 h-fit mt-5 hover:shadow-lg transition-all ease-in-out">
                    <h1 class="text-2xl font-bold text-primary">PEMULA</h1>
                    <div class="flex gap-2 justify-center my-2">
                        <h1 class="text-2xl font-bold">Rp</h1>
                        <h1 class="text-5xl font-bold">90k</h1>
                        <h1 class="text-base self-end">/tahun</h1>
                    </div>
                    <div class="flex flex-col gap-3 *:flex *:gap-2 *:items-center">
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">ID Seniman</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Dashboard Access</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Jual Karya</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Maks. Price 500.000</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success-mute.svg') }}" alt="">
                            <p class="text-base font-semibold">Kesempatan Projek</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success-mute.svg') }}" alt="">
                            <p class="text-base font-semibold">Grup Ekslusif</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success-mute.svg') }}" alt="">
                            <p class="text-base font-semibold">Kesempatan Pameran (Segera)</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success-mute.svg') }}" alt="">
                            <p class="text-base font-semibold">Artwork Certificate</p>
                        </div>
                    </div>
                    <!-- Pemula Paket -->
                    <button onclick="window.location.href='{{ route('register', ['paket' => 1]) }}'"
                        class="bg-primary hover:btn-color-outline mt-3 py-2 rounded-md transition-all ease-in-out text-white font-semibold">
                        Daftar Sekarang
                    </button>
                </div>
                <div class="flex flex-col gap-3 p-5 lg:-mt-3 bg-primary py-10 hover:shadow-lg transition-all ease-in-out">
                    <h1 class="text-2xl font-bold bg-primary text-white">PROFESIONAL</h1>
                    <div class="flex gap-2 justify-center my-2">
                        <h1 class="text-2xl font-bold">Rp</h1>
                        <h1 class="text-5xl font-bold">150k</h1>
                        <h1 class="text-base self-end">/tahun</h1>
                    </div>
                    <div class="flex flex-col gap-3 *:flex *:gap-2 *:items-center">
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">ID Seniman</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Dashboard Access</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Jual Karya</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Maks. Price 10.000.000</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Kesempatan Projek</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Grup Ekslusif</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success-mute.svg') }}" alt="">
                            <p class="text-base font-semibold">Kesempatan Pameran (Segera)</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success-mute.svg') }}" alt="">
                            <p class="text-base font-semibold">Artwork Certificate</p>
                        </div>
                    </div>
                    <!-- Profesional Paket -->
                    <button onclick="window.location.href='{{ route('register', ['paket' => 2]) }}'"
                        class=" btn-color-outline hover:btn-color-fill hover:border-white border border-primary mt-3 py-2 rounded-md transition-all ease-in-out font-semibold">
                        Daftar Sekarang
                    </button>
                </div>
                <div class="flex flex-col gap-3 p-5 h-fit lg:mt-5 hover:shadow-lg transition-all ease-in-out">
                    <h1 class="text-2xl font-bold text-primary">MAESTRO</h1>
                    <div class="flex gap-2 justify-center my-2">
                        <h1 class="text-2xl font-bold">Rp</h1>
                        <h1 class="text-5xl font-bold">400k</h1>
                        <h1 class="text-base self-end">/tahun</h1>
                    </div>
                    <div class="flex flex-col gap-3 *:flex *:gap-2 *:items-center">
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">ID Seniman</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Dashboard Access</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Jual Karya</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Maks. Price 50.000.000</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Kesempatan Projek</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Grup Ekslusif</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Kesempatan Pameran (Segera)</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('assets/images/icons/circle-success.svg') }}" alt="">
                            <p class="text-base font-semibold">Artwork Certificate</p>
                        </div>
                    </div>
                    <!-- Maestro Paket -->
                    <button onclick="window.location.href='{{ route('register', ['paket' => 3]) }}'"
                        class="bg-primary hover:btn-color-outline mt-3 py-2 rounded-md transition-all ease-in-out text-white font-semibold">
                        Daftar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="testimoni" class="py-5 flex flex-col justify-center items-center">
        @include('components.testimoni')

    </div>
@endsection
