<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Kost Kita - Cari Kost Mudah dan Murah</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <link rel="shortcut icon" href="{{url('/images/kost-kita-icon.ico')}}">


    <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('/css/icons.css?v=1.0.4') }}" rel="stylesheet" type="text/css">
    <link href="{{url('/css/style.css?v=1.0.4')}}" rel="stylesheet" type="text/css">

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
                        <img src="{{url('/images/kost-kita-text-large.png')}}" alt="" width="116px">
                    </span>
                    <i>
                        <img src="{{url('/images/kost-kita-icon.png')}}" alt="" >
                    </i>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                    @if (\Illuminate\Support\Facades\Auth::user()->jenis_pengguna === 'pemilik')
                        <!-- notification -->
                        <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                               role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
    {{--                            <span class="badge badge-pill badge-danger noti-icon-badge">2</span>--}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->

                                    <h6 class="dropdown-item-text">
                                        Notifikasi Pemesanan Kamar Kos
                                    </h6>
                                    <div class="slimscroll notification-item-list">
                                        @foreach(
                                            \Illuminate\Support\Facades\Auth::user()
                                            ->notifikasi()
                                            ->orderBy('created_at','DESC')
                                            ->limit(5)
                                            ->get() as $item)
                                        <!-- item-->
                                        <a href="{{ route('notifikasi.read',$item->pivot->id_notifikasi) }}" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-room-service"></i>
                                            </div>
                                            <p class="notify-details">
                                                {{ $item->nama_kamar }}

                                                @if ($item->pivot->dibaca)
                                                    <i class="mdi mdi-check-circle text-success"></i>
                                                @endif
                                                <span >
                                                    {{ $item->pivot->pesan_notifikasi }} {{ $item->nama_kamar }}
                                                </span>
                                                <span class="text-muted">
                                                    {{ \Carbon\Carbon::make($item->pivot->created_at)->isoFormat('D MMMM Y HH:SS') }} WIB
                                                </span>
                                            </p>
                                        </a>
                                        @endforeach

                                    </div>
                            </div>
                        </li>
                    @endif
                    <li class="dropdown notification-list list-inline-item">
                        @if (\Illuminate\Support\Facades\Auth::check())
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{url('/images/kost-kita-icon.ico')}}" alt="user" class="rounded-circle">
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
                        @if (\Illuminate\Support\Facades\Auth::user()->jenis_pengguna === 'admin-pengelola')
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.data-pencari') }}" class="waves-effect">
                                    <i class="fa fa-users"> </i>
                                    <span> Data Pencari Kos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.data-pemilik') }}" class="waves-effect">
                                    <i class="mdi mdi-account-circle"> </i>
                                    <span> Data Pemilik Kos</span>
                                </a>
                            </li>
                        @endif

                        @if (\Illuminate\Support\Facades\Auth::user()->jenis_pengguna === 'pemilik')
                        <li>
                            <a href="{{ route('user.dashboard') }}" class="waves-effect">
                                <i class="ti-home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kost.index') }}" class="waves-effect">
                                <i class="ti-agenda"> </i>
                                <span> Data Kos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pemesanan.index') }}" class="waves-effect">
                                <i class="ti-receipt"> </i>
                                <span> Data Pemesanan Kos</span>
                            </a>
                        </li>

{{--                        <li>--}}
{{--                            <a href="#" class="waves-effect">--}}
{{--                                <i class="ti-write"> </i>--}}
{{--                                <span> Data Kontrak </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
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
                © 2021 kost kita
            </footer>

        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{url('/js/app.js?v=1.0.3')}}"></script>
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
