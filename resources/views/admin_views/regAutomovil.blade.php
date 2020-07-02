@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light">
                <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">
                    <strong>
                        Registro de nuevo automóvil
                    </strong>
                </h4>
                <br>
                <form method="POST" action="{{ route('crearAuto') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-car"></i> </span>
                        </div>
                        <input name="patente" class="form-control" placeholder="Patente" pattern="[A-Z]{2,2}[0-9]{3,3}[A-Z]{2,2}|[A-Z]{3,3}[0-9]{3,3}">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-check-square-o"></i> </span>
                        </div>
                        <input name="marca" class="form-control" placeholder="Marca" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-tag"></i> </span>
                        </div>
                        <input name="modelo" class="form-control" placeholder="Modelo" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-calendar-o"></i> </span>
                        </div>
                        <input name="version" class="form-control" placeholder="Año de versión" pattern="[1-9][0-9]*$">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-spinner"></i> </span>
                        </div>
                        <input name="color" class="form-control" placeholder="Color" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-money"></i> </span>
                        </div>
                        <input name="valor" class="form-control" placeholder="Valor de cotización" pattern="[1-9][0-9]*$">
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Registrar automóvil </button>
                            </div>
                        </div>
                    </div>
                </form>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection
