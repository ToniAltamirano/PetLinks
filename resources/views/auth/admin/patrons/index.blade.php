@extends('auth.admin.admin')

@section('datos')
    <p>
        <h4>{{ __('admin/macropadrins.title') }}</h4>
    </p>
    @include('partial.errores')
    <div class="crud m-2">
        <a  class="btn btn-success align-self-middle" role="button" href="{{ url('/patrons/create') }}">
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
                <th class="id">ID</th>
                <th>{{ __('admin/macropadrins.name') }}</th>
                <th>{{ __('admin/macropadrins.url') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patrons as $patron)
                <tr>
                    <td>{{ $patron->id }}</td>
                    <td>{{ $patron->nombre }}</td>
                    <td>{{ $patron->url }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javaScript">
        $('#editButton').on('click', function() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#formularioEdit').attr('action', "patrons/" + id + "/edit");
            $('#formularioEdit').submit();
        });

        function eliminar() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];

            $('#formularioDelete').attr('action', "patrons/" + id );
            $('#formularioDelete').submit();
        }
    </script>
@endsection
