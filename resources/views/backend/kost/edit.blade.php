@extends('backend.layout.app')

@section('page-title','Kost')

@section('page-description','Update data kost anda ')

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Update Data Kost</h4>
                    <p class="text-muted m-b-30">
                       Update data kost yang anda miliki, pastikan mengisi dengan teliti
                    </p>
                    <form action="{{route('kost.update',$kost->id_kost)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h6 class="my-4">
                            <i class="ti ti-book"></i>
                            DATA KOST
                        </h6>
                        <div class="form-group row">
                            <label for="nama_kost" class="col-3">Nama Kost</label>
                            <div class="col-9">
                                <txt-input name="nama_kost" id="nama_kost" required placeholder="Isikan nama kost" value="{{ $kost->nama_kost }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe_kost" class="col-3">Jenis Kost</label>
                            <div class="col-9">
                                <select name="tipe_kost" id="tipe_kost" class="form-control">
                                    <option selected  value="{{$kost->tipe_kost}}">Kost {{ucfirst($kost->tipe_kost)}}</option>
                                    <option value="putra">Kost Putra</option>
                                    <option value="putri">Kost Putri</option>
                                    <option value="campur">Kost Putra/Putri</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="informasi_pembayaran_kost" class="col-3">Informasi Pembayaran Kost</label>
                            <div class="col-9">
                                <txt-input name="informasi_pembayaran_kost"
                                           id="informasi_pembayaran_kost" required
                                           placeholder="Isikan no rekening & A.n pembayaran kos"
                                            value="{{ $kost->informasi_pembayaran_kost }}"></txt-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="info_tambahan_kost" class="col-3">Informasi Tambahan</label>
                            <div class="col-9">
                                <ta-input name="info_tambahan_kost"
                                          id="info_tambahan_kost" required
                                          placeholder="Isikan informasi selengkapnya tentang kos anda"
                                          value="{{ $kost->info_tambahan_kost }}"
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ketentuan_sewa_kost" class="col-3">Ketentuan Sewa Kost</label>
                            <div class="col-9">
                                <bk-repeater-input
                                    name="ketentuan_sewa_kost[]"
                                    placeholder="Tambahkan poin ketentuan sewa kos"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($kost) }}"
                                    v-bind:data="{{ json_encode($kost->ketentuan_sewa_kost) }}"
                                >
                                </bk-repeater-input>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>
                        <h6 class="my-4">
                            <i class="ti ti-location-pin"></i>
                            ALAMAT KOST
                        </h6>
                        <div class="form-group row">
                            <label for="daerah_kost" class="col-3">Daerah Kost</label>
                            <div class="col-9">
                                <txt-input name="daerah_kost" id="daerah_kost" required placeholder="Isikan keterangan daerah kost" value="{{ $kost->daerah_kost }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_kost" class="col-3">Alamat Kost</label>
                            <div class="col-9">
                                <ta-input name="alamat_kost" id="alamat_kost" required placeholder="Isikan alamat kost" value="{{ $kost->alamat_kost }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_kost" class="col-3">
                                Koordinat Kost <br>
                            </label>
                            <div class="col-9">
                                <map-input name="koordinat_kost"
                                           v-bind:edit="true"
                                           v-bind:kost="{{json_encode($kost)}}"
                                ></map-input>
                            </div>
                        </div>
                        <rg-input
                            v-bind:kecamatan-options="{{$kecamatan}}"
                            v-bind:kost="{{json_encode($kost)}}"
                            v-bind:edit="true"
                        >
                        </rg-input>
                        <div class="dropdown-divider"></div>
                        <h6 class="my-4">
                            <i class="ti ti-harddrives"></i>
                            FASILITAS KOST
                        </h6>
                        <div class="form-group row">
                            <label for="fasilitas" class="col-3">Fasilitas Kamar</label>
                            <div class="col-9">
                                @foreach($fasilitasKamar as $fk)
                                    @if (in_array($fk->id_master_fasilitas,$facilityExist))
                                        <cb-facility
                                            v-bind:facility-master="{{ json_encode($fk) }}"
                                            kost-id="{{$kost->id_kost}}"
                                        ></cb-facility>
                                        @else
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="fasilitas[]" id="fk{{$fk->id_master_fasilitas}}" value="{{$fk->id_master_fasilitas}}">
                                            <label class="custom-control-label" for="fk{{$fk->id_master_fasilitas}}">
                                                {{ $fk->nama_fasilitas }}
                                            </label>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fasilitas" class="col-3">Fasilitas Kamar Mandi</label>
                            <div class="col-9">
                                @foreach($fasilitasKamarMandi as $fk)
                                    @if (in_array($fk->id_master_fasilitas,$facilityExist))
                                        <cb-facility
                                            v-bind:facility-master="{{ json_encode($fk) }}"
                                            kost-id="{{$kost->id_kost}}"
                                        ></cb-facility>
                                    @else
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="fasilitas[]" id="fk{{$fk->id_master_fasilitas}}" value="{{$fk->id_master_fasilitas}}">
                                            <label class="custom-control-label" for="fk{{$fk->id_master_fasilitas}}">
                                                {{ $fk->nama_fasilitas }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fasilitas" class="col-3">Fasilitas Umum</label>
                            <div class="col-9">
                                @foreach($fasilitasUmum as $fk)
                                    @if (in_array($fk->id_master_fasilitas,$facilityExist))
                                        <cb-facility
                                            v-bind:facility-master="{{ json_encode($fk) }}"
                                            kost-id="{{$kost->id_kost}}"
                                        ></cb-facility>
                                    @else
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="fasilitas[]" id="fk{{$fk->id_master_fasilitas}}" value="{{$fk->id_master_fasilitas}}">
                                            <label class="custom-control-label" for="fk{{$fk->id_master_fasilitas}}">
                                                {{ $fk->nama_fasilitas }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fasilitas" class="col-3">Fasilitas Parkir</label>
                            <div class="col-9">
                                @foreach($fasilitasParkir as $fk)
                                    @if (in_array($fk->id_master_fasilitas,$facilityExist))
                                        <cb-facility
                                            v-bind:facility-master="{{ json_encode($fk) }}"
                                            kost-id="{{$kost->id_kost}}"
                                        ></cb-facility>
                                    @else
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="fasilitas[]" id="fk{{$fk->id_master_fasilitas}}" value="{{$fk->id_master_fasilitas}}">
                                            <label class="custom-control-label" for="fk{{$fk->id_master_fasilitas}}">
                                                {{ $fk->nama_fasilitas }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fasilitas" class="col-3">Akses Lingkungan</label>
                            <div class="col-9">
                                @foreach($fasilitasAksesLingkungan as $fk)
                                    @if (in_array($fk->id_master_fasilitas,$facilityExist))
                                        <cb-facility
                                            v-bind:facility-master="{{ json_encode($fk) }}"
                                            kost-id="{{$kost->id_kost}}"
                                        ></cb-facility>
                                    @else
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="fasilitas[]" id="fk{{$fk->id_master_fasilitas}}" value="{{$fk->id_master_fasilitas}}">
                                            <label class="custom-control-label" for="fk{{$fk->id_master_fasilitas}}">
                                                {{ $fk->nama_fasilitas }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <h6 class="my-4">
                            <i class="ti ti-image"></i>
                            FOTO KOST
                        </h6>
                        <div class="form-group row">
                            <label  class="col-3">Foto Bangunan Kost</label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah satu atau lebih foto bangunan"
                                    name="foto_bangunan[]"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($kost) }}"
                                    v-bind:data="{{ json_encode($kost->foto_bangunan_kost) }}"
                                    column="foto_bangunan_kost"
                                ></img-input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-3">Foto Kamar Kost</label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah satu atau lebih foto kamar"
                                    name="foto_kamar[]"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($kost) }}"
                                    v-bind:data="{{ json_encode($kost->foto_kamar_kost) }}"
                                    column="foto_kamar_kost"
                                ></img-input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-3">Foto Kamar Mandi </label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah satu atau lebih foto kamar mandi"
                                    name="foto_kamar_mandi[]"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($kost) }}"
                                    v-bind:data="{{ json_encode($kost->foto_kamar_mandi_kost) }}"
                                    column="foto_kamar_mandi_kost"
                                ></img-input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-3">Foto Fasilitias Bersama</label>
                            <div class="col-9">
                                <img-input
                                    placeholder="unggah satu atau lebih foto fasilitas bersama"
                                    name="foto_fasilitas_bersama[]"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($kost) }}"
                                    v-bind:data="{{ json_encode($kost->foto_fasilitas_bersama_kost) }}"
                                    column="foto_fasilitas_bersama_kost"
                                ></img-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="video_360_kost" class="col-3">Foto 360 Kost</label>
                            <div class="col-9">
                                <vr-input
                                    placeholder="unggah satu file 360"
                                    name="video_360_kost"
                                    v-bind:edit="true"
                                    v-bind:kost="{{ json_encode($kost) }}"
                                    data="{{ $kost->video_360_kost }}"
                                ></vr-input>
                            </div>
                        </div>

{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <h6 class="my-4">--}}
{{--                            <i class="ti ti-video-camera"></i>--}}
{{--                            VIDEO KOST--}}
{{--                        </h6>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-3">Video Tentang Kost</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <vid-input--}}
{{--                                    name="video_kost[]"--}}
{{--                                    v-bind:edit="true"--}}
{{--                                    column="video_kost"--}}
{{--                                    v-bind:kost="{{ json_encode($kost) }}"--}}
{{--                                    v-bind:data="{{ json_encode($kost->video_kost) }}"--}}
{{--                                    placeholder="unggah video tentang kost"></vid-input>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="form-group row">
                            <div class="col-3"></div>
                            <div class="col-3 d-flex justify-content-start">
                                <div>
                                    <save-btn />
                                </div>
                                <a href="{{route('kost.index')}}" class="btn btn-light">
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
