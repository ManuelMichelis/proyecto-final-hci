@extends('layouts.app')

@section('content')
<div class="container">
    <br>
        <h3 class="text-center blue">
            <strong>
                Mis embargos asignados
            </strong>
        </h3>
    </div>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="container section">
            @if (count($embargos) > 0)
            <table id="embargos" class="table text-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Estado</th>
                    <th scope="col">ID del alquiler incumplido</th>
                    <th scope="col">N° del cliente involucrado</th>
                    <th scope="col">Patente del automóvil a recuperar</th>
                    <th scope="col">Fecha de asignación</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($embargos as $emb)
                    <tr>
                        <th scope="row">{{$emb->id}}</th>
                        <td>{{$emb->estado}}</td>
                        <td>{{$emb->id_alquiler_incumplido }}</td>
                        <td>{{$emb->alquilerAEmbargar->nro_cliente }}</td>
                        <td>{{$emb->alquilerAEmbargar->patente_automovil}}</td>
                        <td>{{$emb->created_at}}</td>
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
            <div class="col-xs-11 text-center">
                <br>
                <br>
                <div class="alert alert-secondary" role="alert">
                    <strong>
                        ¡Sin embargos!
                    </strong>
                    No hay embargos asignados para usted que estén registrados en el sistema. Manténgase al tanto.
                </div>
            </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
