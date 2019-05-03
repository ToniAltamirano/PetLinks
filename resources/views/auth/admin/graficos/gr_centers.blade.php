@extends('auth.admin.admin')

@section('datos')
    <div class="card col-11 mx-auto mb-1 bg-transparent">
        <div class="card-body">
            <div class="card-title">
                <h3>Donaciones destinadas a centros</h3>
            </div>
            <div id="donutChartCentros" class="text-center" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/events/graphics/centers/centersDonut.js') }}"></script>
@endsection
