@extends('backend.layout.app')

@section('page-title','Wahana')

@section('page-description','Ubah data wahana ')

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Ubah Data Wahana</h4>
                    <p class="text-muted m-b-30">
                       Isikan data perubahan wahana, pastikan anda mengisi dengan teliti
                    </p>
                    <form action="{{ route('playground.update',$wahana->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="my-4">
                            <i class="ti ti-book"></i>
                            DATA WAHANA
                        </h6>
                        <div class="form-group row">
                            <label for="nama_wahana" class="col-3">Nama Wahana</label>
                            <div class="col-9">
                                <txt-input name="nama_wahana" id="nama_wahana" required placeholder="Isikan nama wahana" value="{{ $wahana->nama_wahana }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi_wahana" class="col-3">Deskripsi Wahana</label>
                            <div class="col-9">
                                <ta-input name="deskripsi_wahana" id="deskripsi_wahana" required placeholder="Isikan informasi selengkapnya tentang wahana" value="{{$wahana->deskripsi_wahana}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-3">Foto Profil Wahana </label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah foto profil wahana"
                                    name="profil_wahana"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($wahana) }}"
                                    v-bind:data="{{ json_encode(array($wahana->profil_wahana)) }}"
                                    column="profil_wahana">
                                </img-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-3">Galeri Wahana</label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah foto-foto tentang wahana"
                                    name="gambar_wahana[]"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($wahana) }}"
                                    v-bind:data="{{ json_encode($wahana->gambar_wahana) }}"
                                    column="gambar_wahana"
                                ></img-input>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <h6 class="my-4">
                            <i class="ti ti-wallet"></i>
                            TARIF WAHANA
                        </h6>
                        <div class="form-group row">
                            <label for="tarif_tiket" class="col-3">Tarif Tiket</label>
                            <div class="col-9">
                                <mn-input  name="tarif_tiket"
                                           placeholder="Isikan tarif tiket wahana"
                                           v-bind:value="{{ (int)$wahana->tarif_tiket }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masa_aktif" class="col-3">Masa Aktif</label>
                            <div class="col-9">
                                <txt-input name="masa_aktif"
                                           id="masa_aktif"
                                           required placeholder="Masa berlaku tiket dalam sekali beli"
                                           value="{{ $wahana->masa_aktif }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="syarat_ketentuan" class="col-3">Syarat & Ketentuan </label>
                            <div class="col-9">
                                <ta-input name="syarat_ketentuan"
                                          id="syarat_ketentuan"
                                          required placeholder="Isikan syarat ketentuan berlaku dalam penggunaan wahana"
                                          value="{{ $wahana->syarat_ketentuan }}"
                                />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-3"></div>
                            <div class="col-3 d-flex justify-content-start">
                                <div>
                                    <save-btn />
                                </div>
                                <a href="{{route('playground.index')}}" class="btn btn-light">
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
