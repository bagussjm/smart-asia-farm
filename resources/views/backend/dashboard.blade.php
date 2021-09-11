@extends('backend.layout.app')

{{--@section('page-title','Dashboard')--}}

{{--@section('page-description','Halaman Dashboard Pemilik Kos')--}}


@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12 text-center">
            <h4>Jumlah Kos : {{ $kostTotal }}</h4>
        </div>
        <div class="col-12 text-center">
            <h4>Jumlah Pemesanan : {{ $bookingTotal }}</h4>
        </div>
        <div class="col-6 text-center">
            <a href="{{ route('kost.index') }}" class="btn btn-primary">
                Data Kos
            </a>
        </div>
        <div class="col-6 text-center" >
            <a href="{{ route('pemesanan.index') }}" class="btn btn-primary">
                Data Pemesanan Kos
            </a>
        </div>
    </div>
@endsection
