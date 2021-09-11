@extends('backend.layout.app')

@section('page-title','Ubah Data Kamar')

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
                    <h4 class="mt-0 page-title">Formulir Ubah Data Kamar</h4>
                    <p class="text-muted m-b-30">
                       Isikan data kamar yang anda miliki, pastikan mengisi dengan teliti
                    </p>
                    <form action="{{route('kamar.update',$kamar->id_kamar)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h6 class="my-4">
                            <i class="mdi mdi-room-service"></i>
                            DATA KAMAR
                        </h6>
                        <div class="form-group row">
                            <label for="nama_kamar" class="col-3">Nama Kamar</label>
                            <div class="col-9">
                                <txt-input name="nama_kamar" id="nama_kamar" required placeholder="Isikan nama kamar" value="{{$kamar->nama_kamar}}"/>
                            </div>
                        </div>
{{--                        <div class="form-group row">--}}
{{--                            <label for="tipe_kamar" class="col-3">Tipe Kamar</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <txt-input name="tipe_kamar" id="tipe_kamar" required placeholder="Isikan tipe kamar" value="{{$kamar->tipe_kamar}}"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="luas_kamar" class="col-3">Luas Kamar</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <txt-input name="luas_kamar" id="luas_kamar" required placeholder="Isikan luas kamar" value="{{$kamar->luas_kamar}}"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="kapasitas_kamar" class="col-3">Kapasitas Kamar</label>--}}
{{--                            <div class="col-9">--}}
{{--                                <txt-input type="number" name="kapasitas_kamar" id="kapasitas_kamar" required placeholder="Isikan kapasitas kamar" value="{{$kamar->kapasitas_kamar}}"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="dropdown-divider"></div>
                        <h6 class="my-4">
                            <i class="mdi  mdi-wallet"></i>
                            DATA BIAYA KAMAR
                        </h6>

                        <div class="form-group row">
                            <label for="biaya_kamar" class="col-3">Opsi Sewa Kamar</label>

                                <div class="col-9">
                                    @foreach($biaya as $cst)
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="biaya_kamar">Biaya </label>
                                                <input type="text" name="id_biaya_kamar[{{$cst->tipe_biaya}}]" value="{{$cst->id_biaya}}" hidden>
                                                <mn-input v-bind:value="{{(Integer)$cst->jumlah_biaya}}" name="biaya_kamar[{{$cst->tipe_biaya}}]" id="biaya_kamar"  placeholder="Isikan biaya sewa kamar"></mn-input>
                                            </div>
                                            <div class="col-6">
                                                <label for="jenis_bayar_kamar">Jenis Bayar</label>
                                                <txt-input type="text" value="{{ $cst->tipe_biaya }}" name="tipe_biaya_kamar[{{$cst->tipe_biaya}}]" id="jenis_bayar_kamar" readonly placeholder="Isikan biaya sewa kamar"></txt-input>
                                            </div>
                                        </div>
                                    @endforeach
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
