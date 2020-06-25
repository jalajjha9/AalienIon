<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config("app.name", "Laravel") }}</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />
        <!-- Styles -->
        <link
            href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/ruang-admin.css') }}"
            rel="stylesheet"
        />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        @stack('styles')
    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul
                class="navbar-nav sidebar sidebar-light accordion"
                id="accordionSidebar"
            >
                <a
                    class="sidebar-brand d-flex align-items-center justify-content-center"
                    href="index.html"
                >
                    <div class="sidebar-brand-icon">
                        <img src="../assets/img/company-logo.jpg" />
                    </div>
                    <div
                        class="sidebar-brand-text mx-3 custom-logo-text"
                        style="color: #333333 !important;"
                    >
                        Alien<span style="color: #ffffff;">Ion</span>
                    </div>
                </a>

                <li class="nav-item active">
                    <a class="nav-link custom-nav-link" href="{{ route('home') }}">
                        <i
                            class="fas fa-fw fa-tachometer-alt"
                            style="color: #e53935; font-size: 1rem;"
                        ></i>
                        <span>Dashboard</span></a
                    >
                </li>

                <li class="nav-item active">
                    <a class="nav-link custom-nav-link" href="{{ route('device-onboarding') }}">
                        <i
                            class="fas fa-fw fa-database"
                            style="color: #29B6F6; font-size: 1rem;"
                        ></i>
                        <span>Device Onboarding</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link custom-nav-link" href="{{ route('device-manage') }}">
                        <i
                            class="fas fa-fw fa-database"
                            style="color: #29B6F6; font-size: 1rem;"
                        ></i>
                        <span>Manage Devices</span></a>
                </li>
            </ul>
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                    <nav
                        class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top"
                    >
                        <button
                            id="sidebarToggleTop"
                            class="btn btn-link rounded-circle mr-3"
                        >
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="searchDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown"
                                >
                                    <form class="navbar-search">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control bg-light border-1 small"
                                                placeholder="What do you want to look for?"
                                                aria-label="Search"
                                                aria-describedby="basic-addon2"
                                                style="border-color: #3f51b5;"
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-primary"
                                                    type="button"
                                                >
                                                    <i
                                                        class="fas fa-search fa-sm"
                                                    ></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="alertsDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span
                                        class="badge badge-danger badge-counter"
                                    ></span>
                                </a>
                                <div
                                    class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown"
                                >
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i
                                                    class="fas fa-file-alt text-white"
                                                ></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="font-weight-bold"
                                                >No Alerts to display</span
                                            >
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="messagesDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <span
                                        class="badge badge-warning badge-counter"
                                    ></span>
                                </a>
                                <div
                                    class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown"
                                >
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a
                                        class="dropdown-item d-flex align-items-center"
                                        href="#"
                                    >
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">
                                                No New messages to display.
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="userDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <img
                                        class="img-profile rounded-circle"
                                        src="../assets/img/boy.png"
                                        style="max-width: 60px;"
                                    />
                                    <span
                                        class="ml-2 d-none d-lg-inline text-white small"
                                        >{{ Auth::user()->name }}</span
                                    >
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown"
                                >
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i
                                            class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >
                                        <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        Logout
                                    </a>
                                    <form
                                        id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        style="display: none;"
                                    >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- Topbar -->
                    <!-- MIDDLE CONTAINER -->
                    @yield('content')
                    <!-- MIDDLE CONTAINER -->
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span
                                >copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                -
                                <b
                                    ><a
                                        href="https://indrijunanda.gitlab.io/"
                                        target="_blank"
                                        >AlienIon</a
                                    ></b
                                >
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{
                asset('assets/vendor/jquery/jquery.min.js')
            }}"></script>
        <script src="{{
                asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')
            }}"></script>
        <script src="{{
                asset('assets/vendor/jquery-easing/jquery.easing.min.js')
            }}"></script>
        <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
        <script src="{{
                asset('assets/vendor/chart.js/Chart.min.js')
            }}"></script>
        <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
        
        @yield ('extra-scripts')
        @yield ('footer_scripts')
        
    </body>
</html>
