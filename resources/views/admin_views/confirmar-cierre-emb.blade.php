@extends('layouts.app')

@section('content')

<div class="">

    <h4 class="card-title mt-0.5 text-center">
        <b>
            Solicitud de cierre del embargo activo con ID: {{ $embargo->id }}
        </b>
    </h4>
    <div class="m-5">
        <div class="m-4">
            <table id="embargoPorFinalizar" class="table text-center table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Repositor a cargo</th>
                    <th scope="col">ID del alquiler incumplido</th>
                    <th scope="col">Inicio de la infracción</th>
                    <th scope="col">Vehículo a recuperar</th>
                    <th scope="col">Cliente involucrado</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$embargo->id}}</th>
                        <td>
                            {{$embargo->repositorACargo->nombreCompleto() }}
                            (legajo: {{$embargo->repositorACargo->legajo}})
                            <br>
                            <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-repo">
                                <i class="fas fa-plus"></i> Detalles
                            </a>
                        </td>
                        <td>
                            {{$embargo->alquilerIncumplido->id}}
                        </td>
                        <td>
                            {{$embargo->alquilerIncumplido->fecha_expiracion}}
                        </td>
                        <td>
                            {{ $vehiculo->nombre() }}
                            (Patente: {{$vehiculo->patente}})
                            <br>
                            <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-vehiculo">
                                <i class="fas fa-plus"></i> Detalles
                            </a>
                        </td>
                        <td>
                            {{$cliente->nombreCompleto()}}
                            (N° {{ $cliente->nro }})
                            <br>
                            <a class="link-primary" href="#" type="button" data-toggle="modal" data-target="#dt-cliente">
                                <i class="fas fa-plus"></i> Detalles
                            </a>
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
                            ¿Está seguro de que desea confirmar la finalización de este embargo?
                        </b>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-5">
            <div class="container">
                <form method="POST" action="{{ route('concretarCierreEmb', ['id'=>$id]) }}">
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

<!-- Modal para detalles del repositor -->
<div class="modal fade" id="dt-repo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            {{$embargo->repositorACargo->legajo}}<br>
            <b>
                Nombre completo:
            </b>
            {{$embargo->repositorACargo->nombreCompleto()}}<br>
            <b>
                Localidad:
            </b>
            {{$embargo->repositorACargo->localidad}}<br>
            <b>
                Dirección:
            </b>
            {{$embargo->repositorACargo->direccion}}<br>
            <b>
                Teléfono:
            </b>
            {{$embargo->repositorACargo->telefono}}<br>
            <b>
                EMail:
            </b>
            {{$embargo->repositorACargo->email_usuario}}<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para detalles del vehículo -->
<div class="modal fade" id="dt-vehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            {{$vehiculo->patente}}<br>
            <b>
                Marca y modelo:
            </b>
            {{$vehiculo->nombre()}}<br>
            <b>
                Versión:
            </b>
            {{$vehiculo->version}}<br>
            <b>
                Color:
            </b>
            {{$vehiculo->color}}<br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para detalles del cliente -->
<div class="modal fade" id="dt-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            {{$cliente->nro}}<br>
            <b>
                DNI:
            </b>
            {{$cliente->DNI}}<br>
            <b>
                Nombre completo:
            </b>
            {{$cliente->nombreCompleto()}}<br>
            <b>
                Localidad:
            </b>
            {{$cliente->localidad}}<br>
            <b>
                Dirección:
            </b>
            {{$cliente->direccion}}<br>
            <b>
                Teléfono:
            </b>
            {{$cliente->telefono}}<br>
            <b>
                EMail:
            </b>
            {{$cliente->email}}<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

@endsection
