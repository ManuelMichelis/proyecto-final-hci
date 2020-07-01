@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <br>
            <br>
            <div class="card bg-light">
                <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">
                    <strong>
                        Registro de nuevo alquiler
                    </strong>
                </h4>
                <br>
                <br>
                <form method="POST" action="{{ route('crearAlquiler') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-address-book-o"></i> </span>
                        </div>
                        <input name="nro" class="form-control" placeholder="N° del cliente" pattern="[1-9][0-9]*$">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-car"></i> </span>
                        </div>
                        <input name="patente" class="form-control" placeholder="Patente del automóvil" pattern="[A-Z]{2,2}[0-9]{3,3}[A-Z]{2,2}|[A-Z]{3,3}[0-9]{3,3}">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-calendar-check-o"></i> </span>
                        </div>
                        <input name="dias" class="form-control" placeholder="Días de alquiler" pattern="[1-9][0-9]*$">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-money"></i> </span>
                        </div>
                        <input name="costo" class="form-control" placeholder="Costo diario" pattern="[1-9][0-9]*$">
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Registrar alquiler </button>
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
