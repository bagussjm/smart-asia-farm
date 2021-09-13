@extends('backend.layout.app')

@section('page-title','Data Wahana')

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
                                           <img src="{{ url('/').$wahana->profil_wahana }}" alt="" width="64px" height="64px">
                                       </div>
                                      <div class="float-right">
                                          <h5 class="text-primary font-18 mt-0 mb-1">
                                              {{ $wahana->nama_wahana }}
                                          </h5>
                                          <p class="font-12 mb-2">
                                              <span class="badge badge-warning">
                                                  Rp.{{ number_format($wahana->tarif_tiket,0,'','.') }}
                                              </span>
                                          </p>

                                          <p class="mb-0">
                                              <i class="ti ti-info-alt"></i>
                                              {{ $wahana->deskripsi_wahana }}
                                          </p>
                                      </div>
                                   </div>

                               </div>
                           </div>

                            <div class="float-right ">
                                <a href="{{ route('playground.edit',$wahana->id)  }}" class="btn  btn-warning align-items-center">
                                    <i class="mdi mdi-pencil-circle"></i>
                                    UPDATE DATA WAHANA
                                </a>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-1">

                                </div>
                                <div class="col-10">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Galeri Wahana</h5>
                                        <div>
                                            <img-lb v-bind:images="{{ json_encode($wahana->gambar_wahana) }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Informasi Tarif</h5>
                                        <div class="row">
                                            <div class="col-3">
                                                <p>Tarif</p>
                                            </div>
                                            <div class="col-9">
                                                <p>
                                                    <b>Rp {{ number_format($wahana->tarif_tiket,0,'','.') }}</b>
                                                </p>
                                            </div>

                                            <div class="col-3">
                                                <p>Masa Aktif</p>
                                            </div>

                                            <div class="col-9">
                                                <p>
                                                    <b>{{ $wahana->masa_aktif }}</b>
                                                </p>
                                            </div>

                                            <div class="col-3">
                                                <p>Syarat & Ketentuan</p>
                                            </div>

                                            <div class="col-9">
                                                <p>
                                                    <b>{{ $wahana->syarat_ketentuan }}</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
