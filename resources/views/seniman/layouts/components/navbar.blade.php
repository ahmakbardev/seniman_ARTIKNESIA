<nav class="navbar-vertical navbar">
    <div id="myScrollableElement" class="h-screen" data-simplebar>
        <!-- brand logo -->
        <a class="navbar-brand" href="{{ route('dashboard.seniman', ['locale' => app()->getLocale()]) }}">
            <img src="{{ asset('assets/images/brand/logo/logo.svg') }}" alt="" />
        </a>

        <!-- navbar nav -->
        <ul class="navbar-nav flex-col" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link  active " href="{{ route('dashboard.seniman', ['locale' => app()->getLocale()]) }}">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i>
                    Dashboard
                </a>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Fitur</div>
            </li>
            <!-- nav item -->
            {{-- <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages"
                    aria-expanded="false" aria-controls="navPages">
                    <i data-feather="layers" class="w-4 h-4 mr-2"></i>
                    Products
                </a>
                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link " href="./profile.html">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./settings.html">Settings</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="./billing.html">Billing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="./pricing.html">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./404-error.html">404 Error</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages"
                    aria-expanded="false" aria-controls="navPages">
                    <i data-feather="layers" class="w-4 h-4 mr-2"></i>
                    Pages
                </a>
                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link " href="./profile.html">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./settings.html">Settings</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="./billing.html">Billing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="./pricing.html">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./404-error.html">404 Error</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <!-- nav item -->
            {{-- <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i>
                    Authentication
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link " href="./sign-in.html">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./sign-up.html">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./forget-password.html">Forget Password</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <!-- nav item -->
            {{-- <li class="nav-item">
                <a class="nav-link " href="./layout.html">
                    <i data-feather="sidebar" class="w-4 h-4 mr-2"></i>
                    Layouts
                </a>
            </li> --}}
            <!-- nav heading -->
            <li class="nav-item">
                <div class="navbar-heading">UI Components</div>
            </li>
            <!-- nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navComponents"
                    aria-expanded="false" aria-controls="navComponents">
                    <i data-feather="user" class="w-4 h-4 mr-2"></i>
                    User
                </a>
                <div id="navComponents" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('seniman.profile.index', ['locale' => app()->getLocale()]) }}">Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- nav item -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevel"
                    aria-expanded="false" aria-controls="navMenuLevel">
                    <i data-feather="corner-left-down" class="w-4 h-4 mr-2"></i>
                    Menu Level
                </a>
                <div id="navMenuLevel" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-col">
                        <li class="nav-item">
                            <a class="nav-link" href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navMenuLevelSecond" aria-expanded="false"
                                aria-controls="navMenuLevelSecond">Two Level</a>
                            <div id="navMenuLevelSecond" class="collapse" data-bs-parent="#navMenuLevel">
                                <ul class="nav flex-col">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!">NavItem 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!">NavItem 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse"
                                data-bs-target="#navMenuLevelThree" aria-expanded="false"
                                aria-controls="navMenuLevelThree">Three Level</a>
                            <div id="navMenuLevelThree" class="collapse" data-bs-parent="#navMenuLevel">
                                <ul class="nav flex-col">
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="#!" data-bs-toggle="collapse"
                                            data-bs-target="#navMenuLevelThreeOne" aria-expanded="false"
                                            aria-controls="navMenuLevelThreeOne">
                                            NavItem 1
                                        </a>
                                        <div id="navMenuLevelThreeOne" class="collapse"
                                            data-bs-parent="#navMenuLevelThree">
                                            <ul class="nav flex-col">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#!">NavChild Item 1</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!">Nav Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <!-- nav item -->
            {{-- <li class="nav-item">
                <div class="navbar-heading">Documentation</div>
            </li> --}}

            <!-- nav item -->
            {{-- <li class="nav-item">
                <a class="nav-link " href="./docs.html">
                    <i data-feather="clipboard" class="w-4 h-4 mr-2"></i>
                    Docs
                </a>
            </li> --}}
            <!-- nav item -->
            {{-- <li class="nav-item">
                <a class="nav-link " href="./changelog.html">
                    <i data-feather="git-pull-request" class="w-4 h-4 mr-2"></i>
                    Changelog
                </a>
            </li> --}}
            <!-- nav heading -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="https://dashui.codescandy.com/" target="_blank">
                    <i data-feather="download" class="w-4 h-4 mr-2"></i>
                    Download
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
