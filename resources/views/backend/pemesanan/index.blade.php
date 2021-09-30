@extends('backend.layout.app')

@section('page-title')
    Data Pemesanan Tiket
@endsection


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
