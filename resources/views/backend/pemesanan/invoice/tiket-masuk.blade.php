@extends('backend.layout.app')

@section('page-title','Invoice Pemesanan Tiket Masuk')

@section('content')
    {{-- dynamic content--}}
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h4 class="float-right font-16">
                                    <strong>Tiket # {{ $tiket->id }}</strong>
                                </h4>
                                <h3 class="mt-0 text-danger">
                                    <i class="fa fa-ticket-alt "></i>
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                        <strong>Ditagih Ke:</strong><br>
                                        {{ $tiket->entranceTicket->user->nama_lengkap }}<br>
                                        {{ $tiket->entranceTicket->user->no_hp }}<br>
                                        {{ $tiket->entranceTicket->user->alamat }}<br>
                                    </address>
                                </div>
                                <div class="col-6 text-right">
                                    <address>
                                        <strong>Penyedia:</strong><br>
                                        Aplikasi Smart Asia Farm<br>
                                        ASIA FARM HAYDAY<br>
                                        Jl. Badak Ujung, Sail, <br>Kec. Tenayan Raya, Kota Pekanbaru, Riau 28131
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 m-t-30">
                                    <address>
                                        <strong>Metode Pembayaran:</strong><br>
                                        {!! $payment !!}

                                    </address>
                                </div>
                                <div class="col-6 m-t-30 text-right">
                                    <address>
                                        <strong>Tanggal Pemesanan:</strong><br>
                                        {{ \Carbon\Carbon::parse($tiket->created_at)->translatedFormat('d F Y H:i') }} WIB<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="p-2">
                                    <h3 class="font-16"><strong>Detail Pemesanan Tiket</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Harga</strong></td>
                                                <td class="text-center"><strong>Jumlah</strong></td>
                                                <td class="text-right"><strong>Total</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>
                                                    {{ $tiket->entranceTicket->nama_tiket_masuk }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $tiket->entranceTicket->formatted_harga_tiket_masuk }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($tiket->entranceTicket->jumlah)
                                                        {{ $tiket->entranceTicket->jumlah }}
                                                    @else
                                                        1
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    @if ($tiket->entranceTicket->total_harga)
                                                        {{ $tiket->entranceTicket->formatted_grand_total }}
                                                    @else
                                                        {{ 'Rp '.number_format(env('ENTRANCE_TICKET'),0,'','.') }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Total</strong></td>
                                                <td class="no-line text-right"><h4 class="m-0">
                                                    {{ $tiket->formatted_total_bayar }}
                                                </h4></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->

                </div>
            </div>
        </div>
    </div>
@endsection
