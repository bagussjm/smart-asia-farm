@extends('backend.layout.app')

@section('page-title','Landmark')

@section('page-description','Ubah data landmark ')

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Ubah Data Landmark</h4>
                    <p class="text-muted m-b-30">
                       Isikan data perubahan landmark, pastikan anda mengisi dengan teliti
                    </p>
                    <form action="{{ route('landmark.update',$landmark->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="my-4">
                            <i class="ti ti-book"></i>
                            DATA LANDMARK
                        </h6>
                        <div class="form-group row">
                            <label for="" class="col-3">Nama Landmark</label>
                            <div class="col-9">
                                <txt-input name="nama_landmark"
                                           id="nama_landmark"
                                           required placeholder="Isikan nama landmark"
                                           value="{{ $landmark->nama_landmark }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi_landmark" class="col-3">Deskripsi Landmark</label>
                            <div class="col-9">
                                <ta-input name="deskripsi_landmark"
                                          id="deskripsi_landmark"
                                          required placeholder="Isikan deskripsi selengkapnya tentang landmark"
                                          value="{{ $landmark->deskripsi_landmark }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="info_landmark" class="col-3">Info Landmark</label>
                            <div class="col-9">
                                <ta-input name="info_landmark"
                                          id="info_landmark"
                                          required placeholder="Isikan informasi selengkapnya tentang landmark"
                                          value="{{ $landmark->info_landmark }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-3">Foto Profil Landmark </label>
                            <div class="col-9">
                                <img-input placeholder="unggah foto profil landmark"
                                           name="profil_landmark"
                                           table-name="landmark"
                                           v-bind:edit="true"
                                           v-bind:edit-obj="{{ json_encode($landmark) }}"
                                           v-bind:data="{{ json_encode(array($landmark->profil_landmark)) }}"
                                           column="profil_landmark"
                                ></img-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-3">Galeri Landmark</label>
                            <div class="col-9">
                                <img-input placeholder="unggah foto-foto tentang landmark"
                                           name="gambar_landmark[]"
                                           table-name="landmark"
                                           column="gambar_landmark"
                                           v-bind:edit="true"
                                           v-bind:edit-obj="{{ json_encode($landmark) }}"
                                           v-bind:data="{{ json_encode($landmark->gambar_landmark) }}"
                                ></img-input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3"></div>
                            <div class="col-3 d-flex justify-content-start">
                                <div>
                                    <save-btn />
                                </div>
                                <a href="{{route('landmark.index')}}" class="btn btn-light">
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
