@extends('auth.admin.admin')

@section('datos')

<p>
    <h4>DONACIONES</h4>
</p>

<div class="crud m-2">

    <a href="{{ url('/donaciones/create') }}" class="btn btn-success">
        <button type="button" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
        </button>
    </a>

    <button type="button" class="btn btn-info ">
        <i class="fas fa-edit"></i>
    </button>

    <button type="button" class="btn btn-danger" onclick="eliminar()">
        <i class="fas fa-trash-alt"></i>
        <form action="" id="formularioDelete" method="POST">
            @method('delete')
            @csrf
        </form>
    </button>
</div>

<table id="tablePag" class="table hover stripe display responsive nowrap w-100">
        <thead>
            <tr>
                <th hidden> ID</th>
                <th>Donante</th>
                <th>Centro receptor</th>
                <th>Centro de destino</th>
                <th>Persona receptora</th>
                <th>Suptipo</th>
                <th>Fecha</th>
                <th>Factura</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donativos as $donativo)
                <tr>
                    <td hidden>{{ $donativo->id}}</td>
                    @if ($donativo->donante->nombre != null)
                        <td>{{ $donativo->donante->nombre }}</td>
                    @else
                        <td></td>
                    @endif

                    @if ($donativo->centros_receptor_id == null)
                        <td>{{ $donativo->centro_receptor_altres }}</td>
                    @else
                        <td>{{ $donativo->centroReceptor->nombre }}</td>
                    @endif
                    <td>{{ $donativo->centroDestino->nombre }}</td>
                    <td>{{ $donativo->usuario_receptor }}</td>
                    <td>{{ $donativo->subtipos->nombre }}</td>
                    <td>{{ $donativo->fecha_donativo }}</td>
                    @if ($donativo->ruta_factura != null)
                        <td><a download="{{ $donativo->ruta_factura }}" href="{{ asset('storage/imagenes/facturas/' . $donativo->ruta_factura) }}">{{ $donativo->ruta_factura }}</a></td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endforeach

        </tbody>

    </table>


@endsection

@section('scripts')
    <script type="text/javaScript">
        function eliminar() {
            var row = $("#tablePag").DataTable().row('.selected').data();
            var id = row[0];
            var action = "donaciones/" + id;
            $('#formularioDelete').attr('action', action);
            $('#formularioDelete').submit();
        }
    </script>
@endsection
