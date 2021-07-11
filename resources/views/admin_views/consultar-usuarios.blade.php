@extends('layouts.app')

@section('content')
<div>
    <h4 class="card-title mt-0.5 text-center">
        <b>
            Cuentas de usuario de los empleados
        </b>
    </h4>
</div>
    <div class="m-5">
        <div class="row justify-content-center">
            <div class="container section">

                @if (count($resultados) > 0)

                    <table id="usuarios" class="table text-center table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Email de usuario</th>
                            <th scope="col">Legajo del empleado asociado</th>
                            <th scope="col">Nombre del empleado</th>
                            <th scope="col">Rol de usuario</th>
                            <th scope="col">Fecha de registro</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultados as $us)
                            <tr>
                                <th scope="row">{{$us->email}}</th>
                                <td>{{$us->legajo_empleado}}</td>
                                <td>{{$us->empleado->nombre.' '.$us->empleado->apellido}}</td>
                                <td>{{$us->type}}</td>
                                <td>{{$us->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $('#usuarios').DataTable({
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
                                No existen usuarios registrados en el sistema. Cuando se registren nuevos usuarios, podrán ser visualizados.
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
