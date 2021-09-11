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
        #bg-login{
            background: rgb(34,193,195);
            background: radial-gradient(circle, rgba(34,193,195,1) 0%, rgba(8,189,159,1) 100%);
        }
    </style>
</head>

<body>

    <div class="wrapper-page" id="app" style="max-width: 700px!important;width: 620px">

        <div class="card overflow-hidden account-card mx-3">

            <div class=" p-4 text-white text-center position-relative" id="bg-login">
                <h4 class="font-20 m-b-5">KOST KITA</h4>
                <p class="text-white-50 mb-4">Cari Kost Murah dan Mudah </p>
                <a href="{{ url('/') }}" class="logo logo-admin">
                    <kk-icon />
                </a>
            </div>
            <div class="account-card-content">

                <form class="form-horizontal m-t-30" action="{{ route('auth.register') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="form-group text-center mb-5">
                        <h4 class="mt-0 header-title">MENDAFTAR SEBAGAI PEMILIK KOST</h4>
                    </div>

                    @if (\Illuminate\Support\Facades\Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>
                                {{ \Illuminate\Support\Facades\Session::get('error') }}
                            </strong>
                        </div>
                    @endif

                    <h4 class="header-title my-4">INFORMASI MASUK </h4>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <txt-input name="email" id="email" required placeholder="Pastikan email anda valid" class="@error('email','register') is-invalid @enderror"/>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <pw-input></pw-input>
                    </div>

                    <h4 class="header-title my-4">INFORMASI PRIBADI</h4>

                    <input type="text" hidden name="jenis_pengguna" value="pemilik" >
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <txt-input name="nama_lengkap" id="nama_lengkap" placeholder="Isikan nama lengkap" required/>
                    </div>

                    <div class="form-group">
                        <label class="d-block mb-3">Jenis Kelamin </label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="laki-laki" required>
                            <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="perempuan" required>
                            <label class="custom-control-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <dp-input
                            placeholder="Isikan tanggal lahir"
                            name="tanggal_lahir"
                            v-bind:max-date="'{{\Carbon\Carbon::now()->translatedFormat('Y-m-d')}}'"
                        >
                        </dp-input>
                    </div>

                    <div class="form-group">
                        <label for="kota_asal">Kota Asal</label>
                        <txt-input name="kota_asal" id="kota_asal" placeholder="Isikan kota asal" required/>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option disabled selected>PILIH STATUS</option>
                            <option value="kawin">Kawin</option>
                            <option value="belum kawin">Belum Kawin</option>
                            <option value="kawin memiliki anak">Kawin Memiliki Anak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <txt-input name="no_hp" id="no_hp" placeholder="Isikan nomor HP" type="number" required/>
                    </div>

                    <div class="form-group row m-t-20 mb-5">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label text-muted" for="defaultCheck1">
                                    Dengan ini saya menyetujui untuk mendaftar di kost kita
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-success w-md waves-effect waves-light" type="submit">MEDAFTAR</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>Sudah Memiliki Akun ? <a href="{{ url('login') }}" class="font-500 text-success"> Masuk </a> </p>

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
