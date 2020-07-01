@extends('layouts.app')

@section('content')
<div class="container">
    <br>
        <h3 class="text-center">
            <strong>
                Revisión de automóviles
            </strong>
        </h3>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-9">

            @if (count($resultados) > 0)

            <table id="automoviles" class="table text-center table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Patente</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Versión</th>
                    <th scope="col">Color</th>
                    <th scope="col">Valor de cotización</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($resultados as $aut)
                    <tr>
                        <th scope="row">{{$aut->patente}}</th>
                        <td>{{$aut->marca}}</td>
                        <td>{{$aut->modelo}}</td>
                        <td>{{$aut->version}}</td>
                        <td>{{$aut->color}}</td>
                        <td>{{$aut->valor}}</td>
                        <td>{{$aut->estado}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                $(document).ready(function() {
                    $('#automoviles').DataTable({
                        "language":
                        {
                            "url":"//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                        }
                    });
                });
            </script>

            @else
            <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <br>
                <br>
                <div class="alert alert-secondary" role="alert">
                    <strong>
                        ¡Sin resultados!
                    </strong>
                    No existe un autmóvil registrado con patente {{$patente}} en el sistema. Revise la patente ingresada.
                </div>
            </div>
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
