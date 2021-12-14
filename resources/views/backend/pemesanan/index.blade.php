@extends('backend.layout.app')

@section('page-title')
    Data Pemesanan Tiket & Wahana
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
                                <th>Status Tiket</th>
                                <th>Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemesanan as $tickets)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tickets->carts[0]->user->nama_lengkap }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($tickets->tanggal_masuk)->translatedFormat('d F Y') }}
                                    {{ \Carbon\Carbon::parse($tickets->jam_masuk)->translatedFormat('H:i') }}
                                    WIB
                                </td>
                                <td>
                                    Rp.{{ number_format($tickets->total_bayar,0,'','.') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($tickets->created_at)->translatedFormat('d F Y H:i') }} WIB
                                </td>
                                <td>
                                    @if ($tickets->status === 'pending')
                                        <span class="badge badge-light">
                                            <i class="mdi mdi-wallet"></i>
                                            Menunggu Pembayaran
                                        </span>
                                    @elseif ($tickets->status === 'success')
                                        <span class="badge badge-success">
                                            <i class="mdi mdi-check-circle"></i>
                                            Pembayaran Selesai
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            <i class="mdi mdi-close-box"></i>
                                            Pembayaran Gagal
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($tickets->is_scanned)
                                        <span class="badge badge-info">
                                            <i class="mdi mdi-ticket-confirmation"></i> terkonfirmasi
                                        </span>
                                        @else
                                        <span class="badge badge-warning">
                                            <i class="mdi mdi-ticket-outline"></i> kadaluwarsa
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pemesanan.show',$tickets->id) }}" class="btn btn-light btn-sm text-danger">
                                        <i class="fa fa-ticket-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
