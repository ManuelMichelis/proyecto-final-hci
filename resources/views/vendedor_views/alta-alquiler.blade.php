@extends('layouts.app')

@section('content')
<div class="m-5">
    <div>
        <h4 class="card-title mt-0.5 text-center">
            <b>
                Ingrese los datos del nuevo alquiler
            </b>
        </h4>
    </div>
    <div class="m-5">
        <div class="d-flex justify-content-center">
            <div class="d-flex">
                <form method="POST" action="{{ route('crearAlquiler') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                        <input name="N°" class="form-control" placeholder="N° del cliente">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fad fa-credit-card-blank"></i>
                            </span>
                        </div>
                        <input name="patente" class="form-control" placeholder="Patente del vehículo">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-day"></i>
                            </span>
                        </div>
                        <input name="dias" class="form-control" placeholder="Días de alquiler">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope-open-dollar"></i>
                            </span>
                        </div>
                        <input name="costo" class="form-control" placeholder="Costo diario">
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
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="d-flex justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" style="display: inline-flex" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="text-center" style="font-size: 13px">
                        {{ $errors->first() }}
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
