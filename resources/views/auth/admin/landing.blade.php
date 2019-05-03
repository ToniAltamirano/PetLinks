@extends('auth.admin.admin')

 @section('own_CSS')
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
@endsection

{{-- @section('titulo', 'PETLINKS')--}}

@section('datos')

<div class="container mt-5">
    <div id="general_menu" class="row">
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/donaciones/create') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-md-3 display-4">{{ __('admin/landing.add_donation') }}</h2>
                        <i class="material-icons md-48 big">euro_symbol</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/donantes/create') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4" class="mt-3 display-4">{{ __('admin/landing.add_donner') }}</h2>
                        <i class="material-icons md-48 big">add</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/usuarios/create') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4" class="mt-3 display-4">{{ __('admin/landing.add_user') }}</h2>
                        <i class="material-icons md-48 big">person_add</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a onclick="showStatsMenu()">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4" class="mt-3 display-4">{{ __('admin/landing.see_stats') }}</h2>
                        <i class="material-icons md-48 big">show_chart</i>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="stats_menu" class="row d-none">
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/graficos/donaciones') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4">{{ __('admin/landing.donations') }}</h2>
                        <i class="material-icons md-48 big">euro_symbol</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/graficos/usuarios') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4">{{ __('admin/landing.users') }}</h2>
                        <i class="material-icons md-48 big">person_outline</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/graficos/donantes') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4">{{ __('admin/landing.donners') }}</h2>
                        <i class="material-icons md-48 big">person</i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-3">
            <a href="{{ url('/graficos/centros') }}">
                <div class="card mb-3 card-landing">
                    <div class="card-body card-landing">
                        <h2 class="mt-3 display-4">{{ __('admin.stats_centers') }}</h2>
                        <i class="material-icons md-48 big">domain</i>
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
