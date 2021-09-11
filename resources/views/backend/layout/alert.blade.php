@extends('backend.layout.app')
@section('alert')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong>
        </div>
    @elseif (\Illuminate\Support\Facades\Session::has('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{\Illuminate\Support\Facades\Session::get('info')}}</strong>
        </div>
    @elseif (\Illuminate\Support\Facades\Session::has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{\Illuminate\Support\Facades\Session::get('warning')}}</strong>
        </div>
    @elseif (\Illuminate\Support\Facades\Session::has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{\Illuminate\Support\Facades\Session::get('danger')}}</strong>
        </div>
    @endif
@endsection
