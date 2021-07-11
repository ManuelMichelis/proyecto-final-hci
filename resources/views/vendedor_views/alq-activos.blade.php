@extends('layouts.app')

@section('content')

    <h4 class="card-title mt-0.5 text-center">
        <b>
            Alquileres activos al día:
        </b>
        {{ $strFecha }}
    </h4>

    <div class="row justify-content-center">
        <div class="container">
            <div class="m-3">

                @if (count($resultados) > 0)

                <table id="alqActivos" class="table text-center table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Vendedor a cargo</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Expiración</th>
                        <th scope="col">Vehículo adquirido</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Costo diario</th>
                        <th scope="col">Estado al cierre</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $alq)
                        <tr>
                            <th scope="row">
                                {{$alq->id}}
                            </th>
                            <td>
                                {{$alq->vendedorACargo->legajo}}
                                <br>
                                <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-vend{{ $alq->id }}">
                                    <i class="fas fa-plus"></i> Detalles
                                </a>
                            </td>
                            <td>
                                {{$alq->fecha_inicio}}
                            </td>
                            <td>
                                {{$alq->fecha_expiracion}}
                            </td>
                            <td>
                                {{$alq->patente_automovil}}
                                <br>
                                <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-vehiculo{{ $alq->id }}">
                                    <i class="fas fa-plus"></i> Detalles
                                </a>
                            </td>
                            <td>
                                {{$alq->nro_cliente}}
                                <br>
                                <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-cliente{{ $alq->id }}">
                                    <i class="fas fa-plus"></i> Detalles
                                </a>
                            </td>
                            <td>
                                {{$alq->costo}}
                            </td>
                            <td>
                                {{$alq->estado_al_cierre}}
                            </td>

                            <!-- MODALS PARA LA FILA -->

                            <!-- Modal para detalles del repositor -->
                            <div class="modal fade" id="dt-vend{{ $alq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        {{$alq->vendedorACargo->legajo}}<br>
                                        <b>
                                            Nombre completo:
                                        </b>
                                        {{$alq->vendedorACargo->nombreCompleto()}}<br>
                                        <b>
                                            Localidad:
                                        </b>
                                        {{$alq->vendedorACargo->localidad}}<br>
                                        <b>
                                            Dirección:
                                        </b>
                                        {{$alq->vendedorACargo->direccion}}<br>
                                        <b>
                                            Teléfono:
                                        </b>
                                        {{$alq->vendedorACargo->telefono}}<br>
                                        <b>
                                            EMail:
                                        </b>
                                        {{$alq->vendedorACargo->email_usuario}}<br>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Modal para detalles del vehículo -->
                            <div class="modal fade" id="dt-vehiculo{{ $alq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        {{$alq->vehiculo->patente}}<br>
                                        <b>
                                            Marca y modelo:
                                        </b>
                                        {{$alq->vehiculo->nombre()}}<br>
                                        <b>
                                            Versión:
                                        </b>
                                        {{$alq->vehiculo->version}}<br>
                                        <b>
                                            Color:
                                        </b>
                                        {{$alq->vehiculo->color}}<br>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Modal para detalles del cliente -->
                            <div class="modal fade" id="dt-cliente{{ $alq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        {{$alq->cliente->nro}}<br>
                                        <b>
                                            DNI:
                                        </b>
                                        {{$alq->cliente->DNI}}<br>
                                        <b>
                                            Nombre completo:
                                        </b>
                                        {{$alq->cliente->nombreCompleto()}}<br>
                                        <b>
                                            Localidad:
                                        </b>
                                        {{$alq->cliente->localidad}}<br>
                                        <b>
                                            Dirección:
                                        </b>
                                        {{$alq->cliente->direccion}}<br>
                                        <b>
                                            Teléfono:
                                        </b>
                                        {{$alq->cliente->telefono}}<br>
                                        <b>
                                            EMail:
                                        </b>
                                        {{$alq->cliente->email}}<br>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>

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
