@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>
        <h3 class="text-center">
            <strong>
                Cierre de alquiler activo
            </strong>
        </h3>
        <h5 class="text-center">
            Alquiler ID:
            <strong>
                {{ $id }}
            </strong>
        </h5>
    <br>
    <br>
    <br>

    @if($alquiler != null)

    <table id="alqActivosCliente" class="table text-center table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de expiración</th>
            <th scope="col">Patente del automóvil</th>
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

    <form method="POST" action="{{ route('finalizarAlquiler', ['id'=>$id]) }}">
        @csrf
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Confirmar cierre</button>
                </div>
            </div>
        </div>
    </form>



    @else
        <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <br>
            <div class="alert alert-secondary" role="alert">
                <strong>
                    ¡Sin resultados!
                </strong>
                No existe alquiler activo, registrado en el sistema, que tenga ID: {{ $id }}. Revise que haya suministrado el ID correcto.
            </div>
        </div>
    @endif
    </div>
</div>

@endsection
