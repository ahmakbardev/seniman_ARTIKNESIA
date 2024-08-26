@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar-vertical navbar">
    <div id="myScrollableElement" class="h-screen" data-simplebar>
        <!-- brand logo -->
        <a class="navbar-brand" href="{{ route('dashboard.seniman', ['locale' => app()->getLocale()]) }}">
            <img src="{{ asset('assets/images/logo/artiknesia.svg') }}" alt=""/>
        </a>

        <!-- navbar nav -->
        <ul class="navbar-nav flex-col" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link {{ $currentRouteName == 'dashboard.seniman' ? 'active' : '' }}"
                   href="{{ route('dashboard.seniman', ['locale' => app()->getLocale()]) }}">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i>
                    Dashboard
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Fitur</div>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ in_array($currentRouteName, ['seniman.karya.index', 'settings']) ? 'show' : '' }}"
                   href="#!" data-bs-toggle="collapse" data-bs-target="#navPages"
                   aria-expanded="{{ in_array($currentRouteName, ['seniman.karya.index', 'settings']) ? 'true' : 'false' }}"
                   aria-controls="navPages">
                    <i data-feather="layers" class="w-4 h-4 mr-2"></i>
                    Produk
                </a>
                <div id="navPages"
                     class="collapse {{ in_array($currentRouteName, ['seniman.karya.index', 'settings','seniman.batch.index' ,'seniman.negotiation.index']) ? 'show' : '' }}"
                     data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link text-base {{ $currentRouteName == 'seniman.karya.index' ? 'active' : '' }}"
                               href="{{ route('seniman.karya.index', ['locale' => app()->getLocale()]) }}">List
                                Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-base {{ $currentRouteName == 'seniman.batch.index' ? 'active' : '' }} {{ $currentRouteName == 'seniman.negotiation.index' ? 'active' : '' }}"
                               href="{{ route('seniman.batch.index', ['locale' => app()->getLocale()]) }}">List
                                Negotiation</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-base {{ $currentRouteName == 'settings' ? 'active' : '' }}"
                                href="./settings.html">Pembelian Produk</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            <!-- nav heading -->
            <li class="nav-item">
                <div class="navbar-heading">UI Components</div>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ in_array($currentRouteName, ['seniman.profile.index']) ? 'show' : '' }}"
                   href="#!" data-bs-toggle="collapse" data-bs-target="#navComponents"
                   aria-expanded="{{ in_array($currentRouteName, ['seniman.profile.index']) ? 'true' : 'false' }}"
                   aria-controls="navComponents">
                    <i data-feather="user" class="w-4 h-4 mr-2"></i>
                    User
                </a>
                <div id="navComponents"
                     class="collapse {{ in_array($currentRouteName, ['seniman.profile.index']) ? 'show' : '' }}"
                     data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link text-base {{ $currentRouteName == 'seniman.profile.index' ? 'active' : '' }}"
                               href="{{ route('seniman.profile.index', ['locale' => app()->getLocale()]) }}">Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- nav item -->
        </ul>
    </div>
</nav>
