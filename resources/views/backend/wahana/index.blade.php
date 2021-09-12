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
                                <th>Deskripsi</th>
                                <th>Harga Tiket</th>
                                <th>Masa Aktif</th>
                                <th>Syarat & Ketentuan</th>
                                <th class="text-center">
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
