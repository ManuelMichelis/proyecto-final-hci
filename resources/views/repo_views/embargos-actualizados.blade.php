@extends('layouts.app')

@section('content')

<div>
    <h4 class="card-title mt-0.5 text-center">
        <b>
            Actualización de órdenes de embargo
        </b>
    </h4>
</div>
<div class="m-5">
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column">
            @if (count($alquileres))
                <div class="alert alert-success" role="alert">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-content-center">
                            <i class="fal fa-clipboard-check fa-2x"></i>
                            &nbsp;
                            &nbsp;
                            <b>
                                ¡Nuevos embargos emitidos!
                            </b>
                            &nbsp;
                            Se registraron
                            &nbsp;
                            <b>
                                {{ count($alquileres) }}
                            </b>
                            &nbsp;
                            nuevas órdenes de embargo en el sistema. Verifique si tiene órdenes asignadas
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-content-center">
                            <i class="fal fa-info-circle fa-2x"></i>
                            &nbsp;
                            &nbsp;
                            <b>
                                ¡No hay nuevas órdenes de embargo registradas!
                            </b>
                            &nbsp;
                            Verifique si tiene órdenes asignadas
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
<div class="m-5">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a id="emb_pend" class="btn btn-primary" href="{{route('home')}}" role="button" style="width:100%">
                Ir al Inicio
            </a>
        </div>
    </div>
</div>


@endsection
