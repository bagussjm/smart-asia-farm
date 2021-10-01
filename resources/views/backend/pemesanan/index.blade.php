@extends('backend.layout.app')

@section('page-title')
    Data Pemesanan Tiket
@endsection

@section('page-tools')
    <button class="btn btn-info float-right" data-toggle="modal" data-target="#ticket-price">
        <i class="fa fa-ticket-alt"></i>
        TIKET MASUK - {{ $tiketMasuk->formatted_harga_tiket_masuk }}
    </button>
@stop

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

        <!-- Modal -->
        <div class="modal fade" id="ticket-price" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        @if ($tiketMasuk)
                        <form action="{{ route('pemesanan.tiket-masuk') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-10">
                                    <h5 class="modal-title" id="exampleModalLabel">Harga Tiket Masuk</h5>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nama_tiket_masuk">Nama Tiket</label>
                                    <input type="text" class="form-control" value="{{ $tiketMasuk->nama_tiket_masuk }}"
                                           placeholder="tuliskan nama tiket masuk (promo tiket masuk)"
                                           name="nama_tiket_masuk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="harga_tiket_masuk">Harga Tiket</label>
                                    <mn-input  placeholder="harga tiket masuk" :value="{{ (int)$tiketMasuk->harga_tiket_masuk }}"
                                               name="harga_tiket_masuk" ></mn-input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-light col-12" data-dismiss="modal">BATALKAN</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-secondary btn-info col-12" >SIMPAN</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
