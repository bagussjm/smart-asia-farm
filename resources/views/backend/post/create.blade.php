@extends('backend.layout.app')

@section('page-title','Postingan')

@section('page-description','Tambah data post')

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Tambah Data Post</h4>
                    <p class="text-muted m-b-30">
                       Isikan data post, pastikan anda mengisi dengan teliti
                    </p>
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h6 class="my-4">
                            <i class="ti ti-book"></i>
                            DATA POSTINGAN
                        </h6>
                        <div class="form-group row">
                            <label for="judul_post" class="col-3">Judul Postingan</label>
                            <div class="col-9">
                                <txt-input name="judul_post" id="judul_post" required placeholder="Isikan nama post"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi_post" class="col-3">Isi Post</label>
                            <div class="col-9">
                                <ta-input name="isi_post" id="isi_post" required placeholder="Tuliskan isi postingan"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Thumbnail Postingan</label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah thumbnail postingan"
                                    table-name="post"
                                           name="thumbnail_post">
                                </img-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3"></div>
                            <div class="col-3 d-flex justify-content-start">
                                <div>
                                    <save-btn />
                                </div>
                                <a href="{{route('post.index')}}" class="btn btn-light">
                                    BATALKAN
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
