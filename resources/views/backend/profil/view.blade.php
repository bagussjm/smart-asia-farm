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
                                           <img src="{{ url($profil->foto_profil_instansi) }}" alt="" width="64px" height="64px">
                                       </div>
                                      <div class="float-right">
                                          <h5 class="text-primary font-18 mt-0 mb-1">
                                              {{ $profil->nama_instansi }}
                                          </h5>


                                          <p class="mb-0">
                                              <i class="ti ti-info-alt"></i>
                                              {{ $profil->keterangan_instansi }}
                                          </p>
                                      </div>
                                   </div>

                               </div>
                           </div>

                            <div class="float-right ">
                                <a href="{{ route('profile.edit',$profil->id) }}" class="btn  btn-warning align-items-center">
                                    <i class="mdi mdi-pencil-circle"></i>
                                    UPDATE DATA
                                </a>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-1">

                                </div>
                                <div class="col-10">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Alamat Instansi</h5>
                                        <div>

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
