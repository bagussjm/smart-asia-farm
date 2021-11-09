@extends('backend.layout.app')

@section('page-title')
    Laporan Pengunjung
@endsection

@section('page-tools')
    <button class="btn btn-info float-right" type="button" onclick="javascript:window.print()">
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
                            <td>
                                {{ $januaryReports['man'] }}
                            </td>
                            <td>
                                {{ $januaryReports['woman'] }}
                            </td>
                            <td>
                                {{ $januaryReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $januaryReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Februari</td>
                            <td>
                                {{ $februaryReports['man'] }}
                            </td>
                            <td>
                                {{ $februaryReports['woman'] }}
                            </td>
                            <td>
                                {{ $februaryReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $februaryReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Maret</td>
                            <td>
                                {{ $marchReports['man'] }}
                            </td>
                            <td>
                                {{ $marchReports['woman'] }}
                            </td>
                            <td>
                                {{ $marchReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $marchReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>April</td>
                            <td>
                                {{ $aprilReports['man'] }}
                            </td>
                            <td>
                                {{ $aprilReports['woman'] }}
                            </td>
                            <td>
                                {{ $aprilReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $aprilReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Mei</td>
                            <td>
                                {{ $mayReports['man'] }}
                            </td>
                            <td>
                                {{ $mayReports['woman'] }}
                            </td>
                            <td>
                                {{ $mayReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $mayReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Juni</td>
                            <td>
                                {{ $julyReports['man'] }}
                            </td>
                            <td>
                                {{ $julyReports['woman'] }}
                            </td>
                            <td>
                                {{ $julyReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $julyReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Juli</td>
                            <td>
                                {{ $juneReports['man'] }}
                            </td>
                            <td>
                                {{ $juneReports['woman'] }}
                            </td>
                            <td>
                                {{ $juneReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $juneReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Agustus</td>
                            <td>
                                {{ $augustReports['man'] }}
                            </td>
                            <td>
                                {{ $augustReports['woman'] }}
                            </td>
                            <td>
                                {{ $augustReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $augustReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>September</td>
                            <td>
                                {{ $septemberReports['man'] }}
                            </td>
                            <td>
                                {{ $septemberReports['woman'] }}
                            </td>
                            <td>
                                {{ $septemberReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $septemberReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Oktober</td>
                            <td>
                                {{ $octoberReports['man'] }}
                            </td>
                            <td>
                                {{ $octoberReports['woman'] }}
                            </td>
                            <td>
                                {{ $octoberReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $octoberReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td>November</td>
                            <td>
                                {{ $novemberReports['man'] }}
                            </td>
                            <td>
                                {{ $novemberReports['woman'] }}
                            </td>
                            <td>
                                {{ $novemberReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $novemberReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>12.</td>
                            <td>Desember</td>
                            <td>
                                {{ $decemberReports['man'] }}
                            </td>
                            <td>
                                {{ $decemberReports['woman'] }}
                            </td>
                            <td>
                                {{ $decemberReports['formatted_grand_total'] }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $decemberReports['formatted_grand_total'] }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
