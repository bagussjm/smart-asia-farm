@extends('backend.layout.app')

@section('page-title')
    Data Pemilik Kos
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
                                <th>Nama Lengkap</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemilikKos as $list)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $list->nama_lengkap }}</th>
                                    <th>{{ $list->no_hp }}</th>
                                    <th>{{ $list->email }}</th>
                                    <th>
                                        <div class="d-flex justify-content-between">

                                            <a href="{{ route('admin.edit-pemilik',$list->id) }}" class="btn btn-sm btn-warning">
                                                <i class="ti ti-pencil" ></i>
                                            </a>

                                            <a href="{{ route('admin.delete-pemilik',$list->id) }}" onclick="return confirm('Yakin ingin menghapus data kost?')" class="btn btn-sm btn-danger">
                                                <i class="ti ti-trash" ></i>
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
