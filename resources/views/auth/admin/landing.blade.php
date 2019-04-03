@extends('auth.admin.admin')

 @section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
@endsection

{{-- @section('titulo', 'PETLINKS')--}}

@section('datos')

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mb-4 mt-3 h-100">
            <a href="{{ url('/donaciones/create') }}">
                <div class="card rounded-0 mb-3 card-landing h-100">
                    <div class="card-body card-landing">
                        <h2>Afegir donació</h2>
                        <i class="material-icons md-48 big">add</i>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card card-landing h-50">
                    <div class="card-body card-landing">
                        <h2>Veure estadístiques</h2>
                        <i class="material-icons md-48 big text-inline">show_chart</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-lg-6 mb-4 mt-3 h-100">
            <a href="{{ url('/donaciones') }}">
            <div class="card card-landing h-50 mb-3">
                    <div class="card-body card-landing">
                        <h2>Afegir donant</h2>
                        <i class="material-icons md-48 big text-inline">person_add</i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
