@extends('layouts.app')

@section('content')
<div class="container">
    <br>
        <h3 class="text-center blue">
            <strong>
                Revisión de empleados
            </strong>
        </h3>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="container section">

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
                    No existen empleados registrados en el sistema. Cuando se registren nuevos empleados, podrán ser visualizados.
                </div>
            </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
