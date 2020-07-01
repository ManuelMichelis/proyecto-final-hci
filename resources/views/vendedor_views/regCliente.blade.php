@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light">
                <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">
                    <strong>
                        Registro de nuevo cliente
                    </strong>
                </h4>
                <br>
                <form method="POST" action="{{ route('crearCliente') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-address-book-o"></i> </span>
                        </div>
                        <input name="DNI" class="form-control" placeholder="DNI del cliente" pattern="[1-9][0-9]*$">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
                        </div>
                        <input name="nombre" class="form-control" placeholder="Nombre" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user-circle-o"></i> </span>
                        </div>
                        <input name="apellido" class="form-control" placeholder="Apellido" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building-o"></i> </span>
                        </div>
                        <input name="localidad" class="form-control" placeholder="Localidad" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                        </div>
                        <input name="direccion" class="form-control" placeholder="Dirección" type="text">
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-flag-o"></i> </span>
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
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Registrar cliente </button>
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
