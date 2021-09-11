@extends('backend.layout.app')

@section('page-title','Data Kost Anda')


@section('content')
    {{-- dynamic content--}}
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                           <div>
                               <div class="card directory-card shadow-none">
                                   <div class="card-body">
                                       <div class="float-left mr-4">
                                           <kk-icon width="64px" height="64px" />
                                       </div>
                                      <div class="float-right">
                                          <h5 class="text-primary font-18 mt-0 mb-1">
                                              {{ $kost->nama_kost }}
                                          </h5>
                                          <p class="font-12 mb-2">
                                              <ct-badge type="{{ $kost->tipe_kost }}">
                                                  {{ $kost->tipe_kost }}
                                              </ct-badge>
                                          </p>

                                          <p class="mb-0">
                                              <i class="ti ti-location-pin"></i>
                                              {{ $kost->alamat_kost }}
                                          </p>
                                      </div>
                                   </div>

                               </div>
                           </div>

                            <div class="float-right ">
                                <a href="{{ route('kost.edit',$kost->id_kost) }}" class="btn  btn-warning align-items-center">
                                    <i class="mdi mdi-pencil-circle"></i>
                                    UPDATE DATA KOS
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#detail" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Detail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#rules" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Ketentuan Kos & Pembayaran</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fasilitas" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Fasilitas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Gambar</span>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#video" role="tab" aria-selected="false">--}}
{{--                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>--}}
{{--                                <span class="d-none d-sm-block">Video</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#settings1" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Lokasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#kamar" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Kamar</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        {{-- kost detail content tab --}}
                        <div class="tab-pane p-3 active" id="detail" role="tabpanel">
                           <div class="row form-group">
                               <div class="col-12">
                                   <label >Nama Kost</label>
                                   <txt-input readonly value="{{ $kost->nama_kost }}" id="nama{{$kost->id_kost}}"/>
                               </div>
                           </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <label >Alamat</label>
                                    <ta-input readonly value="{{ $kost->alamat_kost }}" id="alamat{{$kost->id_kost}}"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Kelurahan </label>
                                    <txt-input readonly value="{{ $kost->kelurahan_kost }}" id="kelurahan{{$kost->id_kost}}"/>
                                </div>
                                <div class="col-6">
                                    <label >Kecamatan</label>
                                    <txt-input readonly value="{{ $kost->kecamatan_kost }}" id="kecamatan{{$kost->id_kost}}"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-12">
                                    <label >Tipe Kost</label>
                                    <txt-input readonly value="{{ ucfirst($kost->tipe_kost) }}"/>
                                </div>
                            </div>
                        </div>

                        {{-- kost payment content tab --}}
                        <div class="tab-pane p-3" id="rules" role="tabpanel">
                            <div class="row form-group">
                                <div class="col-12">
                                    <label >Informasi Pembayaran Kos</label>
                                    <txt-input readonly value="{{ $kost->informasi_pembayaran_kost }}" id="payment{{$kost->informasi_pembayaran_kost}}"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <label >Informasi Tambahan Tentang Kos</label>
                                    <ta-input readonly value="{{ $kost->info_tambahan_kost }}" id="infoTambahan{{$kost->info_tambahan_kost}}"/>
                                </div>
                            </div>
                            @if ($kost->ketentuan_sewa_kost !== null)
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label >Ketentuan Sewa Kos</label>
                                        @for($i = 0; $i < count($kost->ketentuan_sewa_kost); $i++)
                                            <div>
                                                <txt-input readonly
                                                           value="No. {{ ($i+1) }} {{ $kost->ketentuan_sewa_kost[$i] }}"
                                                           class="mb-2"
                                                           id="rules{{ $i }}"/>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endif


                        </div>

                        {{-- facilities content tab --}}
                        <div class="tab-pane p-3" id="fasilitas" role="tabpanel">
                           <div class="form-group row">
                               <div class="col-12">
                                   <label > Fasilitas Kamar</label>

                                   @foreach($kost->fasilitas as $fc)
                                       @if ($fc->kategori_fasilitas === 'kamar')
                                           <div class="custom-control custom-checkbox">
                                               <input type="checkbox" class="custom-control-input disabled" name="fasilitas_kamar[]" checked disabled readonly id="fk{{$fc->id_fasilitas}}" value="{{$fc->id_master_fasilitas}}">
                                               <label class="custom-control-label" for="fk{{$fc->id_fasilitas}}">
                                                   {{ $fc->nama_fasilitas }}
                                               </label>
                                           </div>
                                       @endif
                                   @endforeach
                               </div>
                           </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label > Fasilitas Kamar Mandi</label>

                                    @foreach($kost->fasilitas as $fc)
                                        @if ($fc->kategori_fasilitas === 'kamar mandi')
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input disabled" name="fasilitas_kamar[]" checked disabled readonly id="fk{{$fc->id_fasilitas}}" value="{{$fc->id_master_fasilitas}}">
                                                <label class="custom-control-label" for="fk{{$fc->id_fasilitas}}">
                                                    {{ $fc->nama_fasilitas }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label > Fasilitas Umum</label>

                                    @foreach($kost->fasilitas as $fc)
                                        @if ($fc->kategori_fasilitas === 'umum')
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input disabled" name="fasilitas_kamar[]" checked disabled readonly id="fk{{$fc->id_fasilitas}}" value="{{$fc->id_master_fasilitas}}">
                                                <label class="custom-control-label" for="fk{{$fc->id_fasilitas}}">
                                                    {{ $fc->nama_fasilitas }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label > Fasilitas Parkir</label>

                                    @foreach($kost->fasilitas as $fc)
                                        @if ($fc->kategori_fasilitas === 'parkir')
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input disabled" name="fasilitas_kamar[]" checked disabled readonly id="fk{{$fc->id_fasilitas}}" value="{{$fc->id_master_fasilitas}}">
                                                <label class="custom-control-label" for="fk{{$fc->id_fasilitas}}">
                                                    {{ $fc->nama_fasilitas }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label > Akses Lingkungan</label>

                                    @foreach($kost->fasilitas as $fc)
                                        @if ($fc->kategori_fasilitas === 'akses lingkungan')
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input disabled" name="fasilitas_kamar[]" checked disabled readonly id="fk{{$fc->id_fasilitas}}" value="{{$fc->id_master_fasilitas}}">
                                                <label class="custom-control-label" for="fk{{$fc->id_fasilitas}}">
                                                    {{ $fc->nama_fasilitas }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- iamges content tab --}}
                        <div class="tab-pane p-3" id="messages1" role="tabpanel">
                           <div>
                               <div class="row">
                                   <label class="col-12">Foto Bangunan Kos</label>
                               </div>
                               <img-lb v-bind:images="{{ json_encode($kost->foto_bangunan_kost) }}"/>
                           </div>

                            <div>
                                <div class="row">
                                    <label class="col-12">Foto Kamar Kos</label>
                                </div>
                                <img-lb v-bind:images="{{ json_encode($kost->foto_kamar_kost) }}"/>
                            </div>

                            <div>
                                <div class="row">
                                    <label class="col-12">Foto Kamar Mandi</label>
                                </div>
                                <img-lb v-bind:images="{{ json_encode($kost->foto_kamar_mandi_kost) }}"/>
                            </div>

                            <div>
                                <div class="row">
                                    <label class="col-12">Foto Fasilitas Bersama</label>
                                </div>
                                <img-lb v-bind:images="{{ json_encode($kost->foto_fasilitas_bersama_kost) }}"/>
                            </div>
                            <div>
                                <div class="row p-3">
                                    <label >Foto 360 Kos</label>
                                </div>

                                <div class="row mb-3">
                                    @if ($kost->video_360_kost)
                                        <div class="col-6">
                                            <vr-viewer source="{{ url($kost->video_360_kost) }}"></vr-viewer>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- videos content tab --}}
{{--                        <div class="tab-pane p-3" id="video" role="tabpanel">--}}
{{--                            <div class="row">--}}
{{--                                <label class="col-12">Video Singkat Kos</label>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3">--}}
{{--                                @if ($kost->video_kost)--}}
{{--                                    @for($i = 0; $i < count($kost->video_kost); $i++)--}}
{{--                                    <div class="col-3">--}}
{{--                                        <video width="100%" height="140" controls>--}}
{{--                                            <source src="{{ url($kost->video_kost[$i]) }}" type="video/mp4">--}}
{{--                                            Your browser does not support the video tag.--}}
{{--                                        </video>--}}
{{--                                    </div>--}}
{{--                                    @endfor--}}
{{--                                @endif--}}

{{--                            </div>--}}

{{--                        </div>--}}

                        {{-- location content tab --}}
                        <div class="tab-pane p-3" id="settings1" role="tabpanel">
                           <div class="row">
                               <div class="col-5">
                                   <div class="row">
                                       <div class="col-12">
                                           <label >Alamat</label>
                                       </div>
                                       <div class="col-12 mb-3">
                                           <ta-input id="location-address" readonly value="{{$kost->alamat_kost}}"/>
                                       </div>
                                       <div class="col-12 mb-3">
                                           <label>Daerah </label>
                                           <txt-input readonly value="{{ $kost->daerah_kost }}" id="daerah{{$kost->id_kost}}"/>
                                       </div>
                                       <div class="col-6 mb-3">
                                           <txt-input id="latitude" readonly value="{{ $kost->koordinat_kost['latitude'] }}" />
                                       </div>
                                       <div class="col-6 mb-3">
                                           <txt-input id="latitude" readonly value="{{ $kost->koordinat_kost['longitude'] }}" />
                                       </div>
                                   </div>
                               </div>

                               <div class="col-7">
                                    <div class="row">
                                        <div class="col-12">
                                            <label >
                                                Lokasi
                                            </label>
                                            <map-view v-bind:coordinate="{{ json_encode($kost->koordinat_kost) }}" name="{{ $kost->nama_kost }}"></map-view>
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>

                        {{-- kamar content tab --}}
                        <div class="tab-pane p-3" id="kamar" role="tabpanel">
                            <div class="form-group row">
                                <div class="col-12">
                                    <table class="table" id="table">
                                        <div class="py-3 px-0 float-right">
                                            <a href="{{ route('kamar.create',$kost->id_kost) }}" class="btn mt-1 btn-primary  align-items-center p-1 float-right">
                                                <i class="mdi  mdi-plus-circle"></i>
                                                KAMAR
                                            </a>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kamar</th>
{{--                                                <th>Tipe Kamar</th>--}}
{{--                                                <th>Luas Kamar</th>--}}
{{--                                                <th>Kapasitas Kamar</th>--}}
                                                <th>Harga</th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kamar as $km)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $km->nama_kamar}}
                                                    </td>
{{--                                                    <td>--}}
{{--                                                        {{ $km->tipe_kamar }}--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                       {{ $km->luas_kamar }}--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        {{ $km->kapasitas_kamar }} orang--}}
{{--                                                    </td>--}}
                                                    <td>
                                                        @foreach($km->biaya as $cost)
                                                            {{ $cost->tipe_biaya }} : Rp {{ number_format($cost->jumlah_biaya,0,'','.') }},
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-between">

                                                            <a href="{{ route('kamar.edit',$km->id_kamar) }}" class="btn btn-sm btn-warning">
                                                                <i class="ti ti-pencil" ></i>
                                                            </a>

                                                            <a href="{{ route('kamar.delete',$km->id_kamar) }}" onclick="return confirm('Yakin ingin menghapus data kost?')" class="btn btn-sm btn-danger">
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

                </div>
            </div>
        </div>
    </div>
@endsection
