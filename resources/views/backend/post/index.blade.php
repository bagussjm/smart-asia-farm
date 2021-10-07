@extends('backend.layout.app')

@section('page-title')
    Data Postingan
@endsection

@section('page-tools')
    <a href="{{ route('post.create') }}" class="btn btn-info float-right">
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
                                <th>Judul Postingan</th>
                                <th style="width: 250px">Isi Postingan</th>
                                <th>Thumbnail</th>
                                <th>Tanggal Postingan</th>
                                <th>Tanggal Disunting</th>
                                <th class="text-center">
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $list->judul_post }}</td>
                                <td style="width: 250px">
                                    {{ $list->isi_post }}
                                </td>
                                <td>
                                    <img src="{{ url($list->thumbnail_post) }}" alt=""
                                         width="64px" height="64px">
                                </td>
                                <td>
                                    {{ $list->formatted_post_date }}
                                </td>
                                <td>
                                    {{ $list->formatted_post_date }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-info btn-sm">
                                            <i class="ti ti-view-list"></i>
                                        </a>

                                        <a href="#" class="btn btn-sm btn-warning">
                                            <i class="ti ti-pencil" ></i>
                                        </a>

                                        <form action="#" method="post">
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
