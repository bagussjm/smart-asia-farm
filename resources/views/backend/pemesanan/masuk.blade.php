@extends('backend.layout.app')

@section('page-title')
    Data Pemesanan Tiket Masuk
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
                            @foreach($pemesanan as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->user->nama_lengkap }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($book->tanggal_masuk)->translatedFormat('d F Y') }}
                                        {{ \Carbon\Carbon::parse($book->jam_masuk)->translatedFormat('H:i') }}
                                        WIB
                                    </td>
                                    <td>
                                        {{ $book->ticket->formatted_total_bayar }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($book->ticket->created_at)->translatedFormat('d F Y H:i') }} WIB
                                    </td>
                                    <td>
                                        @if ($book->ticket->status === 'pending')
                                            <span class="badge badge-light">
                                            <i class="mdi mdi-wallet"></i>
                                            Menunggu Pembayaran
                                        </span>
                                        @elseif ($book->ticket->status === 'success')
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
                                        <a href="{{ route('pemesanan.entrance-ticket-invoice',$book->ticket->id) }}" class="btn btn-light btn-sm text-danger">
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
