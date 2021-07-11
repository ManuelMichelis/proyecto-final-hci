@extends('layouts.app')

@section('content')
<div>
    <h4 class="card-title mt-0.5 text-center">
        <b>
            Nómina de empleados
        </b>
    </h4>
    <div class=m-5>
        <div class="row justify-content-center">
            <div class="container">

                @if (count($resultados) > 0)

                    <table id="empleados" class="table text-center table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Legajo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultados as $emp)
                            <tr>
                                <th scope="row">{{$emp->legajo}}</th>
                                <td>{{$emp->nombre.' '.$emp->apellido}}</td>
                                <td>{{$emp->localidad}}</td>
                                <td>{{$emp->direccion}}</td>
                                <td>{{$emp->telefono}}</td>
                                <td>{{$emp->email_usuario}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                            $('#empleados').DataTable({
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
                            No existen empleados registrados en el sistema.
                        </div>
                    </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
