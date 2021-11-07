@extends('backend.layout.app')

@section('page-title')
    Data Pemesanan Wahana
@endsection

{{--@section('page-tools')--}}
{{--    <button class="btn btn-info float-right" data-toggle="modal" data-target="#ticket-price">--}}
{{--        <i class="fa fa-ticket-alt"></i>--}}
{{--        TIKET MASUK - {{ $tiketMasuk->formatted_harga_tiket_masuk }}--}}
{{--    </button>--}}
{{--@stop--}}

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table " id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal & Jam Masuk</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status Pembayaran</th>
                                <th>Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>Nama Pemesan</td>
                                <td>Tanggal & Jam Masuk</td>
                                <td>Jumlah Pembayaran</td>
                                <td>Tanggal Pemesanan</td>
                                <td>Status Pembayaran</td>
                                <td>Tiket</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
