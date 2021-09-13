@extends('backend.layout.app')

@section('page-title')
    Data Landmark
@endsection

@section('page-tools')
    <a href="{{ route('landmark.create') }}" class="btn btn-info float-right">
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
                                <th>Info Landmark</th>
                                <th class="text-center">
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($landmark as $lm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lm->nama_landmark }}</td>
                                    <td>{{ $lm->deskripsi_landmark }}</td>
                                    <td>{{ $lm->info_landmark }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('landmark.show',$lm->id) }}" class="btn btn-info btn-sm">
                                                <i class="ti ti-view-list"></i>
                                            </a>

                                            <a href="{{ route('landmark.edit',$lm->id) }}" class="btn btn-sm btn-warning">
                                                <i class="ti ti-pencil" ></i>
                                            </a>

                                            <form action="{{ route('landmark.delete',$lm->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data wahana?')" class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash" ></i>
                                                </button>
                                            </form>

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
