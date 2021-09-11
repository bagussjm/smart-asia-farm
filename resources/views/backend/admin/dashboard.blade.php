@extends('backend.layout.app')



@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12 text-center">
            <h4>Jumlah Pencari Kos: {{ $totalPencari }}</h4>
        </div>
        <div class="col-12 text-center">
            <h4>Jumlah Pemilik Kos: {{ $totalPemilik }}</h4>
        </div>
        <div class="col-6 text-center">
            <a href="{{ route('admin.data-pencari') }}" class="btn btn-primary">
                Data Pencari Kos
            </a>
        </div>
        <div class="col-6 text-center" >
            <a href="{{ route('admin.data-pemilik') }}" class="btn btn-primary">
                Data Pemilik Kos
            </a>
        </div>
    </div>
@endsection
