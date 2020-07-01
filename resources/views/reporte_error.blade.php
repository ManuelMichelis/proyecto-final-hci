@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>
        <h3 class="text-center">
            <strong>
                {{ $tituloOp }}
            </strong>
        </h3>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="alert alert-danger" role="alert">
            <div class="row vertical-align text-center">
                <div class="col-xs-1">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                </div>
                <div class="col-xs-11 text-center">&nbsp &nbsp
                    <strong>
                        ¡Operación fallida!
                    </strong>
                    {{ $descError }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a id="emb_pend" class="btn btn-primary" href="{{route('home')}}" role="button" style="width:100%">
                Volver a Home
            </a>
        </div>
    </div>
</div>

@endsection
