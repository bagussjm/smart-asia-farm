@extends('backend.layout.app')

@section('page-title')
    Data Wahana
@endsection

@section('page-tools')
    <a href="{{ route('playground.create') }}" class="btn btn-info float-right">
        <i class="mdi mdi-plus-circle"></i>
        TAMBAH
    </a>
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
                                <th>Nama Wahana</th>
                                <th style="width: 250px">Deskripsi</th>
                                <th>Harga Tiket</th>
                                <th>Masa Aktif</th>
                                <th>Syarat & Ketentuan</th>
                                <th class="text-center">
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wahana as $playground)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $playground->nama_wahana }}</td>
                                    <td>{{ $playground->deskripsi_wahana }}</td>
                                    <td>Rp.{{ number_format($playground->tarif_tiket,0,'','.') }}</td>
                                    <td>{{ $playground->masa_aktif }}</td>
                                    <td>{{ $playground->syarat_ketentuan }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="ti ti-view-list"></i>
                                            </a>

                                            <a href="#" class="btn btn-sm btn-warning">
                                                <i class="ti ti-pencil" ></i>
                                            </a>

                                            <a href="#" onclick="return confirm('Yakin ingin menghapus data wahana?')" class="btn btn-sm btn-danger">
                                                <i class="ti ti-trash" ></i>
                                            </a>
                                        </div>
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
