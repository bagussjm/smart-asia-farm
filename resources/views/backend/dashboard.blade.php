@extends('backend.layout.app')

{{--@section('page-title','Dashboard')--}}

{{--@section('page-description','Halaman Dashboard Pemilik Kos')--}}


@section('content')
    {{-- dynamic content--}}
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4">
                            <img src="{{ url('/images/services-icon/01.png') }}" alt="">
                        </div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Pengunjung</h5>
                        <h4 class="font-500">{{ $totalTicketsSold }} </h4>

                    </div>
                    <div class="pt-2">

                        <p class="text-white-50 mb-0">Total Seluruh Pengunjung</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4">
                            <img src="{{ url('/images/services-icon/02.png') }}" alt="">
                        </div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Tiket Terjual</h5>
                        <h4 class="font-500">{{ $totalTicketsSold }} </h4>

                    </div>
                    <div class="pt-2">

                        <p class="text-white-50 mb-0">Penjualan tiket bulan ini</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4">
                            <img src="{{ url('/images/services-icon/03.png') }}" alt="">
                        </div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Data Wahana</h5>
                        <h4 class="font-500"> {{ $totalPlayground }} </h4>

                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0">Seluruh Wahana</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4">
                            <img src="{{ url('/images/services-icon/04.png') }}" alt="">
                        </div>
                        <h5 class="font-16 text-uppercase mt-0 text-white-50">Landmark</h5>
                        <h4 class="font-500">{{ $totalLandmark }}</h4>

                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0">Seluruh Landmark</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-5">Penjualan Tiket Bulanan</h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <div>
                                <canvas id="ticket-sales-line-chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <p class="mb-4 text-muted"><strong>Bulan Ini</strong></p>
                                        <h4>
                                            Rp {{ number_format($ticketSalesThisMonth,0,'','.')  }}
                                        </h4>
                                        <p class="text-muted mb-5">
                                            Akumulusi pendapatan dari penjualan tiket bulan ini
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <p class="mb-4 text-muted"><strong>Bulan Lalu</strong></p>
                                        <h4>
                                            Rp {{ number_format($ticketSalesLastMonth,0,'','.')  }}
                                        </h4>
                                        <p class="text-muted mb-5">
                                            Akumulusi pendapatan dari penjualan tiket bulan lalu
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection
