@extends('layouts.app')

@section('content')
<div>
    <h4 class="card-title mt-0.5 text-center">
        <b>
            Órdenes de embargo efectuadas hasta:
        </b>
        {{ $strFecha }}
    </h4>
</div>
    <div class="m-5">
        <div class="row justify-content-center">
            <div class="container section">
                @if (count($embargos) > 0)
                <table id="embargos" class="table text-center table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Repositor a cargo</th>
                        <th scope="col">ID del alquiler incumplido</th>
                        <th scope="col">Vehículo a recuperar</th>
                        <th scope="col">Cliente involucrado</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($embargos as $emb)
                        <tr>
                            <th scope="row">
                                {{$emb->id}}
                            </th>
                            <td>
                                {{$emb->legajo_repositor}}
                                <br>
                                <a class="link-primary" href="" type="button" data-toggle="modal" data-target="#dt-repo{{ $emb->id }}">
                                    <i class="fas fa-plus"></i> Detalles
                                </a>
                            </td>
                            <td>
                                {{$emb->id_alquiler_incumplido}}
                            </td>
                            <td>
                                {{$emb->vehiculoARecuperar()->patente}}
                                <br>
                                <a class="link-primary" href="" type="button" data-toggle="modal" data-target="#dt-vehiculo{{ $emb->id }}">
                                    <i class="fas fa-plus"></i> Detalles
                                </a>
                            </td>
                            <td>
                                {{$emb->clienteInvolucrado()->nro}}
                                <br>
                                <a class="link-primary" href="" type="button" data-toggle="modal" data-target="#dt-cliente{{ $emb->id }}">
                                    <i class="fas fa-plus"></i> Detalles
                                </a>
                            </td>
                            <td>
                                {{$emb->estado}}
                            </td>

                            <!-- MODALS PARA LA FILA -->

                            <!-- Modal para detalles del repositor -->
                            <div class="modal fade" id="dt-repo{{ $emb->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">
                                            <b>
                                                Detalles del repositor a cargo
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
                                        {{$emb->repositorACargo->legajo}}<br>
                                        <b>
                                            Nombre completo:
                                        </b>
                                        {{$emb->repositorACargo->nombreCompleto()}}<br>
                                        <b>
                                            Localidad:
                                        </b>
                                        {{$emb->repositorACargo->localidad}}<br>
                                        <b>
                                            Dirección:
                                        </b>
                                        {{$emb->repositorACargo->direccion}}<br>
                                        <b>
                                            Teléfono:
                                        </b>
                                        {{$emb->repositorACargo->telefono}}<br>
                                        <b>
                                            EMail:
                                        </b>
                                        {{$emb->repositorACargo->email_usuario}}<br>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Modal para detalles del vehículo -->
                            <div class="modal fade" id="dt-vehiculo{{ $emb->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        {{$emb->vehiculoARecuperar()->patente}}<br>
                                        <b>
                                            Marca y modelo:
                                        </b>
                                        {{$emb->vehiculoARecuperar()->nombre()}}<br>
                                        <b>
                                            Versión:
                                        </b>
                                        {{$emb->vehiculoARecuperar()->version}}<br>
                                        <b>
                                            Color:
                                        </b>
                                        {{$emb->vehiculoARecuperar()->color}}<br>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Modal para detalles del cliente -->
                            <div class="modal fade" id="dt-cliente{{ $emb->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        {{$emb->clienteInvolucrado()->nro}}<br>
                                        <b>
                                            DNI:
                                        </b>
                                        {{$emb->clienteInvolucrado()->DNI}}<br>
                                        <b>
                                            Nombre completo:
                                        </b>
                                        {{$emb->clienteInvolucrado()->nombreCompleto()}}<br>
                                        <b>
                                            Localidad:
                                        </b>
                                        {{$emb->clienteInvolucrado()->localidad}}<br>
                                        <b>
                                            Dirección:
                                        </b>
                                        {{$emb->clienteInvolucrado()->direccion}}<br>
                                        <b>
                                            Teléfono:
                                        </b>
                                        {{$emb->clienteInvolucrado()->telefono}}<br>
                                        <b>
                                            EMail:
                                        </b>
                                        {{$emb->clienteInvolucrado()->email}}<br>
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
                        $('#embargos').DataTable({
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
                            ¡Sin embargos!
                        </strong>
                        No hay embargos registrados en el sistema. Manténgase al tanto.
                    </div>
                </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
