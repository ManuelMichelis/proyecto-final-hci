@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div>
            <h4 class="card-title mt-0.5 text-center">
                <b>
                    Ingrese los datos para el nuevo usuario
                </b>
            </h4>
            <div class="m-5">
                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-signature"></i>
                                </span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('Nombre') }}" placeholder="Nombre" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-signature"></i>
                                </span>
                            </div>
                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('Apellido') }}" placeholder="Apellido" required autocomplete="apellido" autofocus>
                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fad fa-city"></i>
                                </span>
                            </div>
                            <input id="localidad" type="text" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="{{ old('Localidad') }}" placeholder="Localidad" required autocomplete="localidad" autofocus>
                            @error('localidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-sign"></i>
                                </span>
                            </div>
                            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('Direccion') }}" placeholder="Dirección" required autocomplete="direccion" autofocus>
                            @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone-alt"></i>
                                </span>
                            </div>
                            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" required autocomplete="telefono" autofocus>
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <select class="form-control" name="type" id="type" required autocomplete="type">
                                <option value="ninguno" disabled selected>
                                    Rol de usuario
                                </option>
                                <option value="vendedor">Vendedor</option>
                                <option value="repositor">Repositor</option>
                                <option value="administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-key"></i>
                                </span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme contraseña" required autocomplete="new-password">
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Registrar usuario </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
