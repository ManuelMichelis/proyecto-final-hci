@extends('layouts.app')

@section('content')
<div>
    <h4 class="card-title mt-0.5 text-center">
        <b>
            Listado de clientes
        </b>
    </h4>
</div>
    <div class="m-5">
        <div class="row justify-content-center">
            <div class="container section">

                @if (count($resultados) > 0)

                    <table id="clientes" class="table text-center table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">País</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultados as $cli)
                            <tr>
                                <th scope="row">{{$cli->nro}}</th>
                                <td>{{$cli->DNI}}</td>
                                <td>{{$cli->nombre.' '.$cli->apellido}}</td>
                                <td>{{$cli->localidad}}</td>
                                <td>{{$cli->direccion}}</td>
                                <td>{{ $cli->nacionalidad }}</td>
                                <td>{{$cli->telefono}}</td>
                                <td>{{$cli->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $('#clientes').DataTable({
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
                                No existen clientes registrados en el sistema. Cuando se registren nuevos clientes, podrán ser visualizados.
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
