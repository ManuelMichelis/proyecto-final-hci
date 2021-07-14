@extends('layouts.app')

@section('content')
    <div>
        <h4 class="card-title mt-0.3 text-center">
            <b>
                Ingrese los datos del nuevo cliente
            </b>
        </h4>
    </div>
    <div class="m-4">
        <div class="d-flex justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-5 col-lg-3">
                <form method="POST" action="{{ route('crearCliente') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                        <input name="DNI" class="form-control" placeholder="DNI del cliente" pattern="[1-9][0-9]*$">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-signature"></i>
                            </span>
                        </div>
                        <input name="nombre" class="form-control" placeholder="Nombre" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-signature"></i>
                            </span>
                        </div>
                        <input name="apellido" class="form-control" placeholder="Apellido" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fad fa-city"></i>
                            </span>
                        </div>
                        <input name="localidad" class="form-control" placeholder="Localidad" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-sign"></i>
                            </span>
                        </div>
                        <input name="direccion" class="form-control" placeholder="Dirección" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-globe-americas"></i>
                            </span>
                        </div>
                        <input name="nacionalidad" class="form-control" placeholder="Nacionalidad" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input name="telefono" class="form-control" placeholder="Teléfono" pattern="^[0-9]+">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Correo electrónico" type="email">
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="d-flex">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Registrar cliente </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
