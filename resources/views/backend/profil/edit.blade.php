@extends('backend.layout.app')

@section('page-title','Profil')

@section('page-description','Ubah data profil')

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Ubah Data Profil</h4>
                    <p class="text-muted m-b-30">
                       Isikan data perubahan profil, pastikan anda mengisi dengan teliti
                    </p>
                    <form action="{{route('profile.update',$profil->id)}}" id="formEdit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h6 class="my-4">
                            <i class="ti ti-book"></i>
                            DATA PROFIL
                        </h6>
                        <div class="form-group row">
                            <label for="" class="col-3">Nama Intansi</label>
                            <div class="col-9">
                                <txt-input name="nama_instansi"
                                           id="nama_instansi"
                                           required placeholder="Isikan nama landmark"
                                           value="{{ $profil->nama_instansi }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi_landmark" class="col-3">Deskripsi Instansi</label>
                            <div class="col-9">
                                <ta-input name="keterangan_instansi"
                                          id="keterangan_instansi"
                                          required placeholder="Isikan deskripsi selengkapnya tentang instansi"
                                          value="{{ $profil->keterangan_instansi }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="info_landmark" class="col-3">Alamat Instansi</label>
                            <div class="col-9">
                                <ta-input name="alamat_instansi"
                                          id="alamat_instansi"
                                          required placeholder="Isikan informasi selengkapnya tentang instansi"
                                          value="{{ $profil->alamat_instansi }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-3">Lokasi Instansi</label>
                            <div class="col-9">
                                @if ($profil->lokasi_instansi)
                                    <map-input name="koordinat_kost"
                                               v-bind:edit="true"
                                               v-bind:kost="{{json_encode($profil)}}"
                                    ></map-input>
                                    @else
                                    <map-input name="lokasi_instansi"></map-input>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-3">Foto Profil Instansi</label>
                            <div class="col-9">
                                @if ($profil->foto_profil_instansi)
                                    <img-input placeholder="unggah foto profil instansi"
                                               name="foto_profil_instansi"
                                               table-name="profil"
                                               v-bind:edit="true"
                                               v-bind:edit-obj="{{ json_encode($profil) }}"
                                               v-bind:data="{{ json_encode(array($profil->foto_profil_instansi)) }}"
                                               column="foto_profil_instansi"
                                    ></img-input>
                                    @else
                                    <img-input placeholder="unggah foto profil instansi"
                                               name="foto_profil_instansi"
                                               table-name="profil"
                                               v-bind:edit="false"
                                               v-bind:edit-obj="{{ json_encode($profil) }}"
                                               v-bind:data="{{ json_encode(array($profil->foto_profil_instansi)) }}"
                                               column="foto_profil_instansi"
                                    ></img-input>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-3"></div>
                            <div class="col-3 d-flex justify-content-start">
                                <div>
                                    <save-btn />
                                </div>
                                <a href="{{ route('profile.show',$profil->id) }}" class="btn btn-light">
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
