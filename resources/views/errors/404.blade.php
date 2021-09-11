
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
        <link href="{{url('/css/style.css')}}" rel="stylesheet" type="text/css">

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
    <div class="ex-pages">
        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="card mo-mt-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-4 offset-lg-1">
                                    <div class="ex-page-content">
                                        <h1 class="text-dark">404!</h1>
                                        <h4 class="mb-4">Maaf, Halaman tidak ditemukan</h4>
                                        <p class="mb-5">
                                            Kami tidak dapat menampilkan halaman yang anda minta, bisa saja ini terjadi karena data yang anda minta tidak ada
                                        </p>
                                        <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{ route('user.dashboard') }}">
                                            <i class="mdi mdi-home"></i> Kembali ke Dashboard
                                        </a>
                                    </div>

                                </div>
                                <div class="col-lg-5 offset-lg-1">
                                    <img src="{{url('/images/error.png')}}" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end container -->
            </div>
        </div>

    </div>
    <!-- end error page -->

    <!-- App js -->
    <script src="{{mix('/js/app.js')}}"></script>
    <!-- jQuery  -->
    <script src="{{url('/js/app/jquery.min.js')}}"></script>
    <script src="{{url('/js/app/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/js/app/metisMenu.min.js')}}"></script>
    <script src="{{url('/js/app/jquery.slimscroll.js')}}"></script>
    <script src="{{url('/js/app/waves.min.js')}}"></script>
    <script src="{{url('/js/app/veltrix.js')}}"></script>

</body>

</html>
