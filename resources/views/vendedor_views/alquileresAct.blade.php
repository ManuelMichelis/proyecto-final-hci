@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
        <h3 class="text-center blue">
            <strong>
                Alquileres activos hasta:
            </strong>
            {{ $strFecha }}
        </h3>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-9">

            @if (count($resultados) > 0)

            <table id="alqActivos" class="table text-center table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de expiración</th>
                    <th scope="col">Patente del automóvil</th>
                    <th scope="col">N° del cliente</th>
                    <th scope="col">Costo diario</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($resultados as $alq)
                    <tr>
                        <th scope="row">{{$alq->id}}</th>
                        <td>{{$alq->fecha_inicio}}</td>
                        <td>{{$alq->fecha_expiracion}}</td>
                        <td>{{$alq->patente_automovil}}</td>
                        <td>{{$alq->nro_cliente}}</td>
                        <td>{{$alq->costo}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                $(document).ready(function() {
                    $('#alqActivos').DataTable({
                        "language":
                        {
                            "url":"//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                        }
                    });
                });
            </script>

            @else
            <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <br>
                <br>
                <div class="alert alert-secondary" role="alert">
                    <strong>
                        ¡Sin resultados!
                    </strong>
                    No existen alquileres activos registrados en el sistema.
                </div>
            </div>
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
