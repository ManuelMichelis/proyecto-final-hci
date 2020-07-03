@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>
        <h3 class="text-center">
            <strong>
                Actualización de órdenes de embargo
            </strong>
        </h3>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert">
            <div class="row vertical-align text-center">
                <div class="col-xs-1">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                </div>
                <div class="col-xs-11 text-center">&nbsp &nbsp
                    <strong>
                        ¡Actualización finalizada!
                    </strong>
                    &nbsp;
                    Se registraron
                    <strong>
                        {{ count($alquileres) }}
                    </strong>
                    nuevas órdenes de embargo en el sistema.
                    @if (count($alquileres) > 0)
                        Verifique si alguna se ha asignado a usted
                    @else
                        Manténgase actualizado respecto de los embargos pendientes que surjan
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a id="emb_pend" class="btn btn-primary" href="{{route('home')}}" role="button" style="width:100%">
                Ir a Home
            </a>
        </div>
    </div>
</div>

@endsection
