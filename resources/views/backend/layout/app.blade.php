<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>E-Tiket Asia Farm - Booking tiket layanan Asia Farm dengan mudah</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <link rel="shortcut icon" href="{{url('/images/asia-farm-logo.ico')}}">


    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('/css/icons.css?v=1.4.0') }}" rel="stylesheet" type="text/css">
    <link href="{{url('/css/style.css?v=1.4.0')}}" rel="stylesheet" type="text/css">

    <style>
        #table_filter{
            float: right!important;
        }

        #table_paginate{
            float: right!important;
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="app">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left px-3">
                <a href="{{  url('/') }}" class="logo">
                    <span>
                        <img src="{{url('/images/e-ticket-af.png')}}" alt="" width="100%"  height="auto">
                    </span>
                    <i>
                        <img src="{{url('/images/e-ticket-af.png')}}" alt="" width="100%"  height="auto">
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                    <li class="dropdown notification-list list-inline-item">
                        @if (\Illuminate\Support\Facades\Auth::check())
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{url('/images/e-ticket-af-rounded.png')}}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
{{--                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profil</a>--}}

{{--                                    <div class="dropdown-divider"></div>--}}
                                    <a class="dropdown-item text-danger" href="{{ route('auth.logout') }}">
                                        <i class="mdi mdi-power text-danger"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        @endif
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        @if (\Illuminate\Support\Facades\Auth::user()->jenis_pengguna === 'pengelola')
                            <li>
                                <a href="{{ route('pengelola.dashboard') }}" class="waves-effect">
                                    <i class="fa fa-home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">ASIA FARM</li>
                                <li>
                                    <a href="{{ route('profile.show','SMAF2021') }}" class="waves-effect">
                                        <i class="fa fa-archway"> </i>
                                        <span> Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('post.index') }}" class="waves-effect">
                                        <i class="fa fa-newspaper"> </i>
                                        <span> Postingan</span>
                                    </a>
                                </li>
                            <li class="menu-title">Layanan</li>
                                <li>
                                    <a href="{{ route('playground.index') }}" class="waves-effect">
                                        <i class="fa fa-democrat"> </i>
                                        <span> Data Wahana</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('landmark.index') }}" class="waves-effect">
                                        <i class="fa fa-landmark"> </i>
                                        <span> Data Landmark</span>
                                    </a>
                                </li>
                            <li class="menu-title">TIKET </li>
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect">
                                        <i class="fa fa-ticket-alt"></i>
                                        <span> Data Pemesanan
                                            <span class="float-right menu-arrow">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{{ route('pemesanan.index') }}">
                                                Pemesanan Wahana
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pemesanan.masuk') }}">
                                                Pemesanan Tiket
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pemesanan.masuk') }}">
                                                Pemesanan Tiket & Wahana
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <li class="menu-title">LAPORAN</li>
                                <li>
                                    <a href="{{ route('report.visitor-report') }}" class="waves-effect">
                                        <i class="fa fa-print"> </i>
                                        <span> Laporan Pengunjung</span>
                                    </a>
                                </li>
                        @endif

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">

                        @if (\Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong>
                            </div>
                        @elseif (\Illuminate\Support\Facades\Session::has('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{\Illuminate\Support\Facades\Session::get('info')}}</strong>
                            </div>
                        @elseif (\Illuminate\Support\Facades\Session::has('warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{\Illuminate\Support\Facades\Session::get('warning')}}</strong>
                            </div>
                        @elseif (\Illuminate\Support\Facades\Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{\Illuminate\Support\Facades\Session::get('error')}}</strong>
                            </div>
                        @endif

                        <div class="row align-items-center">

                            <div class="col-sm-6">
                                <h4 class="page-title">
                                    @yield('page-title', '')
                                </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        @yield('page-description','')
                                    </li>
                                </ol>

                            </div>

                            <div class="col-sm-6">

                                @yield('page-tools','')

                            </div>
                        </div>
                    </div>

                    {{-- start content--}}

                   @yield('content')

                    {{-- end content--}}

                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->

            <footer class="footer">
                © 2021 E-Tiket Asia Farm
            </footer>

        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{url('/js/app.js?v=1.4.0')}}"></script>
    <!-- jQuery  -->
    <script src="{{url('/js/app/jquery.min.js')}}"></script>
    <script src="{{url('/js/app/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/js/app/metisMenu.min.js')}}"></script>
    <script src="{{url('/js/app/jquery.slimscroll.js')}}"></script>
    <script src="{{url('/js/app/waves.min.js')}}"></script>
    <script src="{{url('/js/app/veltrix.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{ url('/plugins/datatable/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ url('/plugins/datatable/buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('/plugins/datatable/buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('/plugins/datatable/buttons/js/buttons.colVis.min.js') }}"></script>

    {{-- datatable init   --}}
    <script src="{{ url('/js/datatable.init.js') }}"></script>


</body>

</html>
