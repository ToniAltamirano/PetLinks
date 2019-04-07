@extends('auth.admin.admin')

@section('datos')
    <div class="row">
        <div class="card col-11 mx-auto mb-1">
            <div class="card-body">
                <div class="card-title">
                    <h3>Animales</h3>
                </div>
                <div id="pieChartAnimales" class="text-center" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/events/graphics/donors/animales_Donantes_Donut.js') }}"></script>
@endsection
