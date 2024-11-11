<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ប្រព័ន្ធគ្រប់គ្រងសំបុត្រកំណើត</title>

    <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@100..900&display=swap" rel="stylesheet">
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

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1MjbNfrmYb3P9gx" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}

    <!-- DataTables Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css">

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
                    <div>

                    </div>
                    <a class="nav-link d-flex align-items-center" data-widget="navbar-search" href="#" role="button">
                       <div class="d-flex align-items-center">
                        <p  class=" mr-2" style=" font-family: 'Moul', cursive;margin-top: 20px">ប្រវត្តិរូប៖</p>
                        <p class="mt-3 mr-2" style="text-transform: capitalize; font-weight: bold;">
                            {{ Auth::user()->name }}
                        </p>
                       </div>

                        <div style="width: 45px;height:45px" class="bg-light   rounded-pill d-flex justify-content-center align-items-center">
                            <svg style="color: gray" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                    </a>
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
                            <a href="{{ route('dashbaord') }}"
                                class="nav-link {{ Route::is('dashbaord') ? 'bg-info' : '' }}">
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
                            <a href="{{ route('tab.birthcertificate') }}"
                                class="nav-link {{ Route::is('tab.birthcertificate') ? 'bg-info' : '' }}">
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
                        <li class="nav-item {{ Route::is('tab.father') || Route::is('test2') ? 'menu-open' : '' }}">
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
                                style="display: {{ Route::is('tab.father') || Route::is('tab.mother') ? 'block' : 'none' }};">
                                <li class="nav-item">
                                    <a href="{{ route('tab.father') }}"
                                        class="nav-link {{ Route::is('tab.father') ? 'bg-info' : '' }}">
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
                                    <a href="{{ route('tab.mother') }}"
                                        class="nav-link {{ Route::is('tab.mother') ? 'bg-info' : '' }}">
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

                            </ul>
                        </li>


                        <li
                            class="nav-item {{ Route::is('province.index') || Route::is('district.index') || Route::is('commune.index') || Route::is('village.index') ? 'menu-open' : '' }}">
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
                            <ul class="nav nav-treeview" style="display: {{ Route::is('province.index') }};">
                                <li class="nav-item">
                                    <a href="{{ route('province.index') }}"
                                        class="nav-link {{ Route::is('province.index') ? 'bg-info' : '' }}">
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
                                    <a href="{{ route('district.index') }}"
                                        class="nav-link {{ Route::is('district.index') ? 'bg-info' : '' }}">
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
                                    <a href="{{ route('commune.index') }}"
                                        class="nav-link {{ Route::is('commune.index') ? 'bg-info' : '' }}">
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
                                    <a href="{{ route('village.index') }}"
                                        class="nav-link {{ Route::is('village.index') ? 'bg-info' : '' }}">
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



                        {{-- <li class="nav-item">
                            <a href="" class="nav-link">
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
                        </li> --}}


                        <li class="nav-item {{ Route::is('report_birth') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link ">
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
                            <ul class="nav nav-treeview" style="display;  {{ Route::is('report_birth') }}">

                                <li class="nav-item">
                                    <a href="{{ route('report_birth') }}" class="nav-link {{ Route::is('report_birth') ? 'bg-info' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>របាយការណ៍សំបុត្រកំណើត</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>របាយការណ៍ភូមិ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>របាយការណ៍ឃុំ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-move-right">
                                            <path d="M18 8L22 12L18 16" />
                                            <path d="M2 12H22" />
                                        </svg>
                                        <p>របាយការណ៍ស្រុក/ខេត្ត</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- <li class="nav-item">
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
                        </li> --}}

                        <li class="nav-item">
                            <a href="#" class="nav-link">


                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    @method("DELETE")
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-square-arrow-out-up-left">
                                    <path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6" />
                                    <path d="m3 3 9 9" />
                                    <path d="M3 9V3h6" />
                                </svg>
                                    <button class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('តើអ្នកចង់ចាកចេញមែនទេ?')" >ចាក់ចេញ</button>
                                   </form>


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

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3+oEzE5e1g2z5jAXf5gSk8Jp1eKB" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- DataTables JS -->


    {{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script> --}}

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Bootstrap JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> --}}

    <!-- DataTables JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    <!-- Initialize DataTable -->
    <script>
        new DataTable('#Datatable', {
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Khmer.json"
            }
        });
    </script>

</body>

</html>
