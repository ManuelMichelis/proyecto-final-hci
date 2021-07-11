@extends('layouts.app')

@section('content')

<div class="container">
    <div class="m-5">
        <div class="d-flex flex-column">
            <h4 class="text-center">
                <b>
                    {{ $titulo }}
                </b>
            </h4>
            <div class="m-5">
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <div class="alert alert-danger" role="alert">
                            <div class="d-flex align-content-center">
                                <i class="fal fa-times-circle fa-2x"></i>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <div class="block">
                                    <b>
                                        ¡Operación fallida!
                                    </b>
                                    {{ $error }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-4">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex">
                            <a class="btn btn-primary" href="{{ URL::previous() }}" role="button" style="width:100%">
                                Reintentar operación
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
