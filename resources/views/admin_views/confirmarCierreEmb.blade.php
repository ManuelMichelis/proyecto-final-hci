@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>
        <h3 class="text-center">
            <strong>
                Cierre de embargo pendiente
            </strong>
        </h3>
        <h5 class="text-center">
            Embargo ID:
            <strong>
                {{ $id }}
            </strong>
        </h5>
    <br>
    <br>
    <br>

    @if ($embargo != null)

    <table id="alqActivosCliente" class="table text-center table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Legajo del repositor a cargo</th>
            <th scope="col">Nombre del repositor</th>
            <th scope="col">ID del alquiler incumplido</th>
            <th scope="col">Patente del automóvil a recuperar</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$embargo->id}}</th>
                <td>{{$embargo->legajo_repositor}}</td>
                <td>{{$embargo->repositorACargo->nombre.' '.$embargo->repositorACargo->apellido}}</td>
                <td>{{$embargo->id_alquiler_incumplido}}</td>
                <td>{{$embargo->alquilerAEmbargar->patente_automovil}}</td>
            </tr>
        </tbody>
    </table>

    <form method="POST" action="{{ route('finalizarEmbargo', ['id'=>$id]) }}">
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
