@extends('layouts.app')

@section('content')

    <div>
        <h4 class="card-title mt-0.5 text-center">
            <b>
                Mis embargos asignados
            </b>
        </h4>
    </div>
    <div class="m-5">
        <div class="d-flex justify-content-center">
            <div class="d-flex flex-column">
                @if (!count($embargos))
                    <div class="alert alert-secondary" role="alert">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-content-center">
                                <b>
                                    ¡Sin embargos pendientes!
                                </b>
                                &nbsp;
                                No tiene órdenes de embargo pendientes de atender. Manténgase al tanto
                            </div>
                        </div>
                    </div>
                @else
                    <table id="embargos" class="table text-center table-bordered">
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
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
