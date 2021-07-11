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
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de expiración</th>
                    <th scope="col">Patente del vehículo</th>
                    <th scope="col">N° del cliente</th>
                    <th scope="col">Costo diario</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$alquiler->id}}</th>
                        <td>{{$alquiler->fecha_inicio}}</td>
                        <td>{{$alquiler->fecha_expiracion}}</td>
                        <td>{{$alquiler->patente_automovil}}</td>
                        <td>{{$alquiler->nro_cliente}}</td>
                        <td>{{$alquiler->costo}}</td>
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
