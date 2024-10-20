<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                {{-- <li class="nav-item d-block d-md-none">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-1">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">

                <span class="brand-text font-weight-light">ប្រព័ន្ធគ្រប់គ្រងសំបុត្រកំណើត</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- SidebarSearch Form -->
                <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-layout-dashboard">
                                    <rect width="7" height="9" x="3" y="3" rx="1" />
                                    <rect width="7" height="5" x="14" y="3" rx="1" />
                                    <rect width="7" height="9" x="14" y="12" rx="1" />
                                    <rect width="7" height="5" x="3" y="16" rx="1" />
                                </svg>
                                <p>
                                    ផ្ទាំងគ្រប់គ្រង
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('testing') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-calendar-fold">
                                    <path d="M8 2v4" />
                                    <path d="M16 2v4" />
                                    <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                                    <path d="M3 10h18" />
                                    <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                                </svg>
                                <p>
                                    សំបុត្រកំណើត
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::is('testing') || Route::is('test2') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-user">
                                    <path d="M15 13a3 3 0 1 0-6 0" />
                                    <path
                                        d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                                    <circle cx="12" cy="8" r="2" />
                                </svg>
                                <p>
                                    ព័ត៌មានគ្រួសារ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {{ Route::is('testing') || Route::is('test2') ? 'block' : 'none' }};">
                                <li class="nav-item">
                                    <a href="{{ route('testing') }}"
                                        class="nav-link {{ Route::is('testing') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ព័ត៌មានរបស់ឪពុក</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ព័ត៌មានរបស់ម្តាយ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ព័ត៌មានរបស់កូន</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item {{ Route::is('testing') || Route::is('test2') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                    <path
                                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <p>
                                    ទីកន្លែងរស់នៅ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {{ Route::is('testing') || Route::is('test2') ? 'block' : 'none' }};">
                                <li class="nav-item">
                                    <a href="{{ route('testing') }}"
                                        class="nav-link {{ Route::is('testing') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ខេត្តបច្ចុប្បន្ន</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ស្រុកកំណើត</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ឃុំសង្កាត់</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ភូមិកំណើត</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="{{ route('testing') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                <p>
                                    អ្នកប្រើប្រាស់
                                </p>
                            </a>
                        </li>


                        <li class="nav-item {{ Route::is('testing') || Route::is('test2') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scroll-text">
                                    <path d="M15 12h-5" />
                                    <path d="M15 8h-5" />
                                    <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                                    <path
                                        d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                                </svg>
                                <p>
                                    របាយការណ៍
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                style="display: {{ Route::is('testing') || Route::is('test2') ? 'block' : 'none' }};">
                                <li class="nav-item">
                                    <a href="{{ route('testing') }}"
                                        class="nav-link {{ Route::is('testing') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ខេត្តបច្ចុប្បន្ន</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ស្រុកកំណើត</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ឃុំសង្កាត់</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('test2') }}"
                                        class="nav-link {{ Route::is('test2') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>ភូមិកំណើត</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('testing') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-lock-keyhole">
                                    <circle cx="12" cy="16" r="1" />
                                    <rect x="3" y="10" width="18" height="12" rx="2" />
                                    <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                                </svg>
                                <p>
                                    ប្តូរពាក្យសម្ងាត់
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('testing') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-square-arrow-out-up-left">
                                    <path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6" />
                                    <path d="m3 3 9 9" />
                                    <path d="M3 9V3h6" />
                                </svg>
                                <p>
                                    ចាក់ចេញ
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <div>
            @yield('content')
        </div>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItem = document.querySelector('.nav-item > a.nav-link');
            const treeviewMenu = document.querySelector('.nav-treeview');

            navItem.addEventListener('click', function(e) {
                e.preventDefault();
                /
                if (treeviewMenu.style.display === 'block') {
                    treeviewMenu.style.display = 'none';
                } else {
                    treeviewMenu.style.display = 'block';
                }
            });

            const links = document.querySelectorAll('.nav-treeview .nav-link');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    treeviewMenu.style.display = 'none';
                });
            });
        });
    </script>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>
