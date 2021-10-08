@extends('backend.layout.app')

@section('page-title')
    Laporan Pengunjung
@endsection

@section('page-tools')
    <button class="btn btn-info float-right" >
        <i class="fa fa-print"></i>
    </button>
@stop

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="9">
                                <h4>
                                    PENGUNJUNG
                                </h4>
                            </th>
                        </tr>

                        <tr>
                            <th><b>No.</b></th>
                            <th ><b>Tahun/Bulan</b></th>
                            <th colspan="3">
                                <b>
                                    Pengunjung Lokal / <br>
                                    Wisatawan Nusantara
                                </b>
                            </th>
                            <th colspan="3">
                                <b>
                                    Pengunjung Asing / <br>
                                    Wisatawan Mancanegara
                                </b>
                            </th>
                            <th>
                                <b>Perkiraan Uang Beredar</b>
                            </th>
                        </tr>

                        <tr>
                            <th colspan="2" class="text-center">
                                <b>
                                    {{ \Carbon\Carbon::now()->translatedFormat('Y') }}
                                </b>
                            </th>
                            <th>
                                <b>
                                    Lk2
                                </b>
                            </th>
                            <th>
                                <b>
                                    Pr
                                </b>
                            </th>
                            <th>
                                <b>
                                    Jlh
                                </b>
                            </th>
                            <th>
                                <b>
                                    Lk2
                                </b>
                            </th>
                            <th>
                                <b>
                                    Pr
                                </b>
                            </th>
                            <th>
                                <b>
                                    Jlh
                                </b>
                            </th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>Januari</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
