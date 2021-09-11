@extends('backend.layout.app')

@section('page-title')
    Data Kost
    <a href="{{ route('kost.create') }}">
        <i class="fas fa-plus-circle"></i>
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
                                <th>Nama Kost</th>
                                <th>Alamat</th>
                                <th>Jenis Kost</th>
                                <th>Fasilitas</th>
                                <th >
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userKost as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->nama_kost }}</td>
                                    <td>{{ $list->alamat_kost }}</td>
                                    <td>
                                        <ct-badge type="{{ $list->tipe_kost }}">
                                            {{ $list->tipe_kost }}
                                        </ct-badge>

                                    </td>
                                    <td>
                                        @foreach($list->fasilitas as $fs)
                                            {{ $fs->nama_fasilitas }},
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('kost.show',$list->id_kost) }}" class="btn btn-info btn-sm">
                                                <i class="ti ti-view-list"></i>
                                            </a>

                                            <a href="{{ route('kost.edit',$list->id_kost) }}" class="btn btn-sm btn-warning">
                                                <i class="ti ti-pencil" ></i>
                                            </a>

                                            <a href="{{ route('kost.delete',$list->id_kost) }}" onclick="return confirm('Yakin ingin menghapus data kost?')" class="btn btn-sm btn-danger">
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
