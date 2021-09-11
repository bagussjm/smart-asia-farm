@extends('backend.layout.app')

@section('page-title','Tambah Data Kamar')

@section('page-description')
    {{ $kost->nama_kost }}
@endsection

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
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
                   </div>
               </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Tambah Data Kamar</h4>
                    <p class="text-muted m-b-30">
                       Isikan data kamar yang anda miliki, pastikan mengisi dengan teliti
                    </p>
                    <form action="{{route('kamar.store',$kost->id_kost)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h6 class="my-4">
                            <i class="mdi mdi-room-service"></i>
                            DATA KAMAR
                        </h6>
                        <div class="form-group row">
                            <label for="nama_kamar" class="col-3">Nama Kamar</label>
                            <div class="col-9">
                                <txt-input name="nama_kamar" id="nama_kamar" required placeholder="Isikan nama kamar"/>
                            </div>
                        </div>
{{--                        <div class="form-group row">--}}
{{--                            <label for="tipe_kamar" class="col-3">Tipe Kamar</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <txt-input name="tipe_kamar" id="tipe_kamar" required placeholder="Isikan tipe kamar"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="luas_kamar" class="col-3">Luas Kamar</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <txt-input name="luas_kamar" id="luas_kamar" required placeholder="Isikan luas kamar"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="kapasitas_kamar" class="col-3">Kapasitas Kamar</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <txt-input type="number" name="kapasitas_kamar" id="kapasitas_kamar" required placeholder="Isikan kapasitas kamar"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="dropdown-divider"></div>
                        <h6 class="my-4">
                            <i class="mdi  mdi-wallet"></i>
                            DATA BIAYA KAMAR
                        </h6>
                        <div class="form-group row">
                            <label for="biaya_kamar" class="col-3">Opsi Sewa Kamar</label>
                            <div class="col-5">
                                <label for="biaya_kamar">Biaya </label>
                                <mn-input  name="biaya_kamar[mingguan]"  placeholder="Isikan biaya sewa kamar"/>
                            </div>
                            <div class="col-4">
                                <label for="jenis_bayar_kamar">Jenis Bayar</label>
                                <txt-input type="text" value="mingguan"   readonly placeholder="Isikan biaya sewa kamar"></txt-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biaya_kamar" class="col-3"></label>
                            <div class="col-5">
                                <label for="biaya_kamar">Biaya </label>
                                <mn-input  name="biaya_kamar[bulanan]"  placeholder="Isikan biaya sewa kamar"/>
                            </div>
                            <div class="col-4">
                                <label for="jenis_bayar_kamar">Jenis Bayar</label>
                                <txt-input type="text" value="bulanan"  id="jenis_bayar_kamar" readonly placeholder="Isikan biaya sewa kamar"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biaya_kamar" class="col-3"></label>
                            <div class="col-5">
                                <label for="biaya_kamar">Biaya </label>
                                <mn-input  name="biaya_kamar[tahunan]" id="biaya_kamar"  placeholder="Isikan biaya sewa kamar"/>
                            </div>
                            <div class="col-4">
                                <label for="jenis_bayar_kamar">Jenis Bayar</label>
                                <txt-input type="text" value="tahunan"  id="jenis_bayar_kamar" readonly placeholder="Isikan biaya sewa kamar"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-3"></div>
                            <div class="col-3 d-flex justify-content-start">
                                <div>
                                    <save-btn />
                                </div>
                                <a href="{{route('kost.show',$kost->id_kost)}}" class="btn btn-light">
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
