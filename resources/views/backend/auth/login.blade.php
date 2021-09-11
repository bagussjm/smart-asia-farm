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
    <link href="{{url('/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{url('/css/style.css?v=1.0.3')}}" rel="stylesheet" type="text/css">

    <style>
        #bg-login{
            background: #02a499;
        }
    </style>
</head>

<body>


    <div class="wrapper-page" id="app">

        <div class="card overflow-hidden account-card mx-3">

            <div class=" p-4 text-white text-center position-relative" id="bg-login">
                <h4 class="font-20 m-b-5">KOST KITA</h4>
                <p class="text-white-50 mb-4">Cari Kost Murah dan Mudah </p>
                <a href="{{ url('/') }}" class="logo logo-admin">
                    <kk-icon />
                </a>
            </div>
            <div class="account-card-content">

                <form class="form-horizontal m-t-30" action="{{ route('auth.authenticate') }}" method="post">
                    @csrf
                    @if (\Illuminate\Support\Facades\Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>
                                {{ \Illuminate\Support\Facades\Session::get('error') }}
                            </strong>
                        </div>
                    @elseif (\Illuminate\Support\Facades\Session::has('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{\Illuminate\Support\Facades\Session::get('info')}}</strong>
                        </div>
                    @endif


                    <div class="form-group">
                        <label for="email">Nama Pengguna</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Isikan email ">
                    </div>

                    <div class="form-group">
                        <label for="userpassword">Kata Sandi</label>
                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Masukkan kata sandi">
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-success w-md waves-effect waves-light" type="submit">MASUK</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            <a href="#"><i class="mdi mdi-lock"></i> Lupa Password?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>Belum Memiliki Akun ? <a href="{{ url('register') }}" class="font-500 text-success"> Daftar Sekarang </a> </p>

        </div>

    </div>
    <!-- end wrapper-page -->


    <!-- App js -->
    <script src="{{url('/js/app.js?v=1.0.3')}}"></script>
    <!-- jQuery  -->
    <script src="{{url('/js/app/jquery.min.js')}}"></script>
    <script src="{{url('/js/app/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/js/app/metisMenu.min.js')}}"></script>
    <script src="{{url('/js/app/jquery.slimscroll.js')}}"></script>
    <script src="{{url('/js/app/waves.min.js')}}"></script>
    <script src="{{url('/js/app/veltrix.js')}}"></script>

</body>

</html>
