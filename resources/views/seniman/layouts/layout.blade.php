<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description"
          content="Dash UI - TailwindCSS HTML Admin Template Free and open-source Github, provides developers with everything need to create Web Application & Kick start project"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo-square.png') }}"/>

    <!-- Libs CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
          rel="stylesheet">

    {{-- @env('production') --}}
        <!-- Append version number to CSS file name -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.04') }}">
        <!-- Add cache-control headers for CSS and JavaScript files -->
        <link rel="preload" href="{{ asset('css/app.css?v=1.04') }}" as="style" crossorigin="anonymous"/>
    {{-- @endenv

    @env('local')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @endenv --}}

    @yield('assets')
    @livewireStyles

    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/dist/apexcharts.css') }}"/>

    <title>{{ Auth::user()->username }} Seniman | ARTIKNESIA</title>
</head>

<body>
@livewireScripts
<main>
    <!-- start the project -->
    <!-- app layout -->
    <div id="app-layout" class="overflow-x-hidden flex">
        <!-- start navbar -->
        @include('seniman.layouts.components.navbar')
        <!--end of navbar-->

        <!-- app layout content -->
        <div id="app-layout-content"
             class="min-h-screen w-full min-w-[100vw] md:min-w-0 ml-[15.625rem] [transition:margin_0.25s_ease-out]">
            <!-- start navbar -->
            @include('seniman.layouts.components.header')
            <!-- end of navbar -->

            <div class="bg-indigo-600 px-8 pt-10 lg:pt-14 pb-16 flex justify-between items-center mb-3">
                <!-- title -->
                <h1 class="text-xl text-white">Project</h1>
            </div>

            @yield('seniman_content')

            @include('seniman.layouts.components.toast')

            @include('seniman.layouts.components.footer')

        </div>
    </div>
    <!-- end of project -->
</main>

@if (session('showPasswordModal'))
    <div id="passwordModal"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0">
        <div
                class="bg-white rounded-lg shadow-lg transform w-full max-w-md transition-transform duration-500 translate-y-10">
            <div class="p-6 text-center">
                <h2 class="text-2xl font-semibold mb-4">Ganti Password</h2>
                <form method="POST" action="{{ route('update-password', ['locale' => app()->getLocale()]) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="new_password" class="block text-start text-gray-700">Password Baru</label>
                        <input type="password" name="new_password" id="new_password"
                               class="w-full mt-2 p-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="new_password_confirmation" class="block text-start text-gray-700">Konfirmasi
                            Password
                            Baru</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                               class="w-full mt-2 p-2 border border-gray-300 rounded">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Ganti
                            Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
        integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    feather.replace();
</script>

<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

<!-- Libs JS -->
<script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
@yield('scripts')
<!-- Theme JS -->
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if ({{ session('showPasswordModal') ? 'true' : 'false' }}) {
            setTimeout(() => {
                const modal = document.getElementById('passwordModal');
                modal.classList.remove('opacity-0', 'translate-y-10');
                modal.classList.add('opacity-100', 'translate-y-0');
            }, 1000); // Delay 1 detik
        }
    });
</script>
</body>

</html>
