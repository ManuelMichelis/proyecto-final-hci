@extends('layouts.app')

@section('content')
<div class="container">
    <br>
        <h3 class="text-center blue">
            <strong>
                Revisión de embargos
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
                    <th scope="col">Legajo del repositor a cargo</th>
                    <th scope="col">Nombre del repositor</th>
                    <th scope="col">ID del alquiler incumplido</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($embargos as $emb)
                    <tr>
                        <th scope="row">{{$emb->id}}</th>
                        <td>{{$emb->estado}}</td>
                        <td>{{$emb->legajo_repositor }}</td>
                        <td>{{$emb->repositorACargo->nombre.' '.$emb->repositorACargo->apellido }}</td>
                        <td>{{$emb->id_alquiler_incumplido}}</td>
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
@endsection
