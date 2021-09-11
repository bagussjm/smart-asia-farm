@extends('backend.layout.app')

@section('page-title','Ubah Data Pencari Kos')


@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 page-title">Formulir Ubah Data Pencari</h4>
{{--                    <p class="text-muted m-b-30">--}}
{{--                        Isikan data kost yang anda miliki, pastikan mengisi dengan teliti--}}
{{--                    </p>--}}
                    <form action="{{route('admin.update-pencari',$pencari->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h6 class="my-4">
                            <i class="mdi mdi-account-circle"></i>
                            DATA MASUK
                        </h6>
                        <div class="form-group row">
                            <label for="nama_kost" class="col-3">Email</label>
                            <div class="col-9">
                                <txt-input readonly type="email" name="nama_kost" id="nama_kost" required placeholder="Isikan Email" value="{{ $pencari->email }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_kost" class="col-3">Password</label>
                            <div class="col-9">
                                <txt-input type="password" readonly name="nama_kost" id="nama_kost" required placeholder="Isikan Kata Sandi" value="{{ $pencari->password }}"/>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>
                        <h6 class="my-4">
                            <i class="mdi mdi-database"></i>
                            DATA PENCARI KOS
                        </h6>
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-3">Nama Lengkap</label>
                            <div class="col-9">
                                <txt-input  name="nama_lengkap" id="nama_lengkap" required placeholder="Isikan nama lengkap" value="{{ $pencari->nama_lengkap }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_kost" class="col-3">Jenis Kelamin</label>
                            <div class="col-9">
                                @if ($pencari->jenis_kelamin === 'laki-laki')
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" checked id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="laki-laki" required>
                                        <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="perempuan" required>
                                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                                    </div>
                                @else
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" checked id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="laki-laki" required>
                                        <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="perempuan" required>
                                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-3">Tanggal Lahir</label>
                            <div class="col-9">
                                <txt-input type="date"  name="tanggal_lahir" id="tanggal_lahir" required placeholder="Isikan tanggal lahir" value="{{ $pencari->tanggal_lahir }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota_asal" class="col-3">Kota Asal</label>
                            <div class="col-9">
                                <txt-input   name="kota_asal" id="kota_asal" required placeholder="Isikan kota asal" value="{{ $pencari->kota_asal }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota_asal" class="col-3">Status</label>
                            <div class="col-9">
                                <select name="status" id="status" class="form-control" required>
                                    <option  selected>{{ ucwords($pencari->status) }}</option>
                                    <option value="kawin">Kawin</option>
                                    <option value="belum kawin">Belum Kawin</option>
                                    <option value="kawin memiliki anak">Kawin Memiliki Anak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikan_terakhir" class="col-3">Pendidikan Terakhir</label>
                            <div class="col-9">
                                <txt-input   name="pendidikan_terakhir" id="pendidikan_terakhir" required placeholder="Isikan pendidikan terakhir" value="{{ $pencari->pendidikan_terakhir }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-3">No Hp</label>
                            <div class="col-9">
                                <txt-input type="number"  name="no_hp" id="no_hp" required placeholder="Isikan no hp" value="{{ $pencari->no_hp }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesi" class="col-3">Profesi</label>
                            <div class="col-9">
                                <txt-input   name="profesi" id="profesi" required placeholder="Isikan profesi" value="{{ $pencari->profesi }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="institusi_tempat_kerja" class="col-3">Intitusi Tempat Kerja </label>
                            <div class="col-9">
                                <txt-input   name="institusi_tempat_kerja" id="institusi_tempat_kerja" required placeholder="Isikan institusi tempat kerja " value="{{ $pencari->institusi_tempat_kerja }}"/>
                            </div>
                        </div>


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
