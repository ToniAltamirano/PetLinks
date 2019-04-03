@extends('auth.admin.admin')

{{-- @section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('titulo', 'PETLINKS')--}}

@section('datos')

<div class="container">
    <div id="general_menu" class="row">
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/donaciones/create') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Afegir donació</h2>
                        <i class="material-icons md-48 big">euro_symbol</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/donantes/create') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Afegir donant</h2>
                        <i class="material-icons md-48 big">add</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/usuaris/create') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Afegir usuari</h2>
                        <i class="material-icons md-48 big">person_add</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a onclick="showStatsMenu()">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Veure estadístiques</h2>
                        <i class="material-icons md-48 big">show_chart</i>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="stats_menu" class="row d-none">
        <div class="col-lg-6 mt-3">
            <a href="">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Donaciones</h2>
                        <i class="material-icons md-48 big">euro_symbol</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Usuarios</h2>
                        <i class="material-icons md-48 big">person</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2>Donantes</h2>
                        <i class="material-icons md-48 big">person</i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/events/landing.js') }}"></script>
@endsection
