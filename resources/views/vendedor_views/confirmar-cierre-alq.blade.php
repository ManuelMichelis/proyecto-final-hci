@extends('layouts.app')

@section('content')

<div class="container">

    <h4 class="card-title mt-0.5 text-center">
        <b>
            Solicitud de cierre del alquiler activo con ID: {{ $alquiler->id }}
        </b>
    </h4>
    <div class="m-5">
        <div class="m-4">
            <table id="alqActivosCliente" class="table text-center table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Vendedor a cargo</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Expiración</th>
                    <th scope="col">Vehículo adquirido</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Costo diario</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            {{$alquiler->id}}
                        </th>
                        <td>
                            {{$alquiler->vendedorACargo->legajo}}
                            <br>
                            <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-vend{{ $alquiler->id }}">
                                <i class="fas fa-plus"></i> Detalles
                            </a>
                        </td>
                        <td>
                            {{$alquiler->fecha_inicio}}
                        </td>
                        <td>
                            {{$alquiler->fecha_expiracion}}
                        </td>
                        <td>
                            {{$alquiler->patente_automovil}}
                            <br>
                            <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-vehiculo{{ $alquiler->id }}">
                                <i class="fas fa-plus"></i> Detalles
                            </a>
                        </td>
                        <td>
                            {{$alquiler->nro_cliente}}
                            <br>
                            <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-cliente{{ $alquiler->id }}">
                                <i class="fas fa-plus"></i> Detalles
                            </a>
                        </td>
                        <td>
                            {{$alquiler->costo}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="m-5">
            <div class="d-flex justify-content-center">
                <div class="alert alert-info" role="alert">
                    <div class="d-flex align-content-center">
                        <i class="fal fa-question-circle fa-2x"></i>
                        &nbsp;
                        &nbsp;
                        <b>
                            ¿Está seguro de que desea confirmar el cierre de este alquiler?
                        </b>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para detalles del vendedor -->
        <div class="modal fade" id="dt-vend{{ $alquiler->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">
                        <b>
                            Detalles del vendedor a cargo
                        </b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>
                        Legajo:
                    </b>
                    {{$alquiler->vendedorACargo->legajo}}<br>
                    <b>
                        Nombre completo:
                    </b>
                    {{$alquiler->vendedorACargo->nombreCompleto()}}<br>
                    <b>
                        Localidad:
                    </b>
                    {{$alquiler->vendedorACargo->localidad}}<br>
                    <b>
                        Dirección:
                    </b>
                    {{$alquiler->vendedorACargo->direccion}}<br>
                    <b>
                        Teléfono:
                    </b>
                    {{$alquiler->vendedorACargo->telefono}}<br>
                    <b>
                        EMail:
                    </b>
                    {{$alquiler->vendedorACargo->email_usuario}}<br>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal para detalles del vehículo -->
        <div class="modal fade" id="dt-vehiculo{{ $alquiler->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <b>
                            Detalles del vehículo a recuperar
                        </b>
                    </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <b>
                        Patente:
                    </b>
                    {{$alquiler->vehiculo->patente}}<br>
                    <b>
                        Marca y modelo:
                    </b>
                    {{$alquiler->vehiculo->nombre()}}<br>
                    <b>
                        Versión:
                    </b>
                    {{$alquiler->vehiculo->version}}<br>
                    <b>
                        Color:
                    </b>
                    {{$alquiler->vehiculo->color}}<br>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal para detalles del cliente -->
        <div class="modal fade" id="dt-cliente{{ $alquiler->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <b>
                        Detalles del cliente involucrado
                    </b>
                    </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <b>
                        N° de cliente:
                    </b>
                    {{$alquiler->cliente->nro}}<br>
                    <b>
                        DNI:
                    </b>
                    {{$alquiler->cliente->DNI}}<br>
                    <b>
                        Nombre completo:
                    </b>
                    {{$alquiler->cliente->nombreCompleto()}}<br>
                    <b>
                        Localidad:
                    </b>
                    {{$alquiler->cliente->localidad}}<br>
                    <b>
                        Dirección:
                    </b>
                    {{$alquiler->cliente->direccion}}<br>
                    <b>
                        Teléfono:
                    </b>
                    {{$alquiler->cliente->telefono}}<br>
                    <b>
                        EMail:
                    </b>
                    {{$alquiler->cliente->email}}<br>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>

        <div class="m-5">
            <div class="container">
                <form method="POST" action="{{ route('concretarCierreAlq', ['id'=>$id]) }}">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="d-flex">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Confirmar cierre</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
