<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARTIKNESIA | @stack('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-square.png') }}" type="image/x-icon">
    <!-- Append version number to CSS file name -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.03') }}">
    <!-- Add cache-control headers for CSS and JavaScript files -->
    <link rel="preload" href="{{ asset('css/app.css?v=1.03') }}" as="style" crossorigin="anonymous" />
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <script src="{{ asset('seniman/assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('seniman/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('seniman/assets/js/charts-pie.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    @stack('head')
</head>


<body>
    <div class="flex h-screen bg-gray-900 font-montserrat" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{-- <div class="notifications absolute top-20 right-5 flex flex-col gap-1">
        <div class=" p-3 bg-green-400/50 border border-green-500 text-white rounded-md">aa</div>
        <div class=" p-3 bg-green-400/50 border border-green-500 text-white rounded-md">aa</div>
        <div class=" p-3 bg-green-400/50 border border-green-500 text-white rounded-md">aa</div>
    </div> --}}
        @include('seniman.layouts.components.aside')

        <div class="flex flex-col flex-1 w-full">
            @include('seniman.layouts.components.header')
            <main class="h-full overflow-y-auto bg-gray-900">
                <div class="container px-6 mx-auto grid overflow-x-hidden">
                    <div class="py-6">
                        <nav class="text-sm font-medium mt-4 text-gray-500">
                            @php
                                $segments = '';
                                $skipLocale = true;
                            @endphp
                            @foreach (Request::segments() as $segment)
                                @if ($skipLocale)
                                    @php
                                        $skipLocale = false;
                                        continue;
                                    @endphp
                                @endif
                                @php $segments .= "/$segment"; @endphp
                                @if ($loop->last)
                                    <span>{{ ucfirst($segment) }}</span>
                                @else
                                    <a href="{{ url('/', app()->getLocale()) . $segments }}"
                                        class="hover:text-gray-400">{{ ucfirst($segment) }}</a>
                                    <i class="text-[8px] h-full fa-solid fa-angle-right"></i>
                                @endif
                            @endforeach
                        </nav>
                        <h2 class="text-2xl font-semibold text-gray-200">
                            @stack('title')
                        </h2>
                    </div>
                    @yield('seniman_content')
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
</body>

</html>
