@extends('layouts.app')

@section('content')

<div>
    <h4 class="card-title mt-0.5 text-center">
        <b>
            Listado de vehículos
        </b>
    </h4>
</div>
    <div class="m-5">
        <div class="row justify-content-center">
            <div class="container">

                @if (count($resultados) > 0)

                    <table id="vehiculos" class="table text-center table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Patente</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Versión</th>
                            <th scope="col">Color</th>
                            <th scope="col">Valor de cotización</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Foto</th>
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
                                @if ($aut->imagen == null)
                                    <td> Sin foto </td>
                                @else
                                    <td>
                                        <a href="#{{$aut->patente}}" type="button" data-toggle="modal" class="link-primary">
                                            <i class="fas fa-camera-retro"></i>
                                            &nbsp;
                                            Ver foto
                                        </a>
                                        <!-- Modal para mostrar foto del automóvil -->
                                        <div class="modal fade" id="{{$aut->patente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content text-center">
                                                <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">
                                                        Vehículo:
                                                        <b>
                                                            {{ $aut->nombre() }}
                                                        </b>
                                                        {{ $aut->version }}
                                                        (patente:
                                                        <b>
                                                            {{$aut->patente}}
                                                        </b>
                                                        )
                                                </h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="imgAutomovil" src="{{'data:image/png;base64, '.$aut->imagen}}">
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $('#vehiculos').DataTable({
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
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
