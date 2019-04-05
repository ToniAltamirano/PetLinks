@extends('auth.admin.admin')

<script> var titulo = 'Campanyes'; </script>

@section('datos')
    <p>
        <h4>{{ __('admin/campañas.index_title') }}</h4>
    </p>
    @include('partial.errores')
    <div class="crud m-2">
        <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/campaigns/create') }}">
            <i class="fas fa-plus-circle"></i>
        </a>

        <button type="button" class="btn btn-info" id="editButton">
            <i class="fas fa-edit"></i>
            <form action="" id="formularioEdit" method="GET"></form>
        </button>

        <button type="button" class="btn btn-danger" onclick="eliminar();">
            <i class="fas fa-trash-alt"></i>
            <form action="" id="formularioDelete" method="POST">
                @method('delete')
                @csrf
            </form>
        </button>
    </div>

    <table id="tablePag" class="table hover stripe display responsive nowrap">
        <thead>
            <tr>
                <th hidden>ID</th>
                <th>{{ __('admin/campañas.index_title_ca') }}</th>
                <th>{{ __('admin/campañas.index_title_en') }}</th>
                <th>{{ __('admin/campañas.index_title_es') }}</th>
                <th>{{ __('admin/campañas.index_url') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns as $campaign)
                <tr>
                    <td hidden>{{ $campaign->id }}</td>
                    <td>{{ $campaign->titulo_ca }}</td>
                    <td>{{ $campaign->titulo_en }}</td>
                    <td>{{ $campaign->titulo_es }}</td>
                    <td>{{ $campaign->url }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')

<script src="{{ asset('js/events/tabla.js') }}"></script>
    <script type="text/javaScript">
        $('#editButton').on('click', function() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#formularioEdit').attr('action', "campaigns/" + id + "/edit");
            $('#formularioEdit').submit();
        });

        function eliminar() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#formularioDelete').attr('action', "campaigns/" + id );
            $('#formularioDelete').submit();
        }
    </script>
@endsection
