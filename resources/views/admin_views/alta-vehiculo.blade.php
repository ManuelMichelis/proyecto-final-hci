@extends('layouts.app')

@section('content')

    <h4 class="card-title mt-0.5 text-center">
        <b>
            Ingrese datos del nuevo vehículo
        </b>
    </h4>

    <div class="d-flex justify-content-center">        
        <div class="d-flex flex-column">            
            <div class="m-3">
                <form method="POST" action="{{ route('crearAuto') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fad fa-credit-card-blank"></i>
                            </span>
                        </div>
                        <input name="patente" class="form-control" placeholder="Patente">
                    </div>
    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-shield-alt"></i>
                            </span>
                        </div>
                        <input name="marca" class="form-control" placeholder="Marca" type="text">
                    </div>
    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-tag"></i>
                            </span>
                        </div>
                        <input name="modelo" class="form-control" placeholder="Modelo" type="text">
                    </div>
    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-day"></i>
                            </span>
                        </div>
                        <input name="version" class="form-control" placeholder="Año de versión" pattern="[1-9][0-9]*$">
                    </div>
    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-fill-drip"></i>
                            </span>
                        </div>
                        <input name="color" class="form-control" placeholder="Color" type="text">
                    </div>
    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-sack-dollar"></i>
                            </span>
                        </div>
                        <input name="valor" class="form-control" placeholder="Valor de cotización" pattern="[1-9][0-9]*$">
                    </div>
                        
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Registrar vehículo </button>
                            </div>
                        </div>
                    </div>
                </form>
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
