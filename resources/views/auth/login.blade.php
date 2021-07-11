@extends('layouts.app')

@section('content')

<div class="m-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    <b>
                        {{ __('Inicio de sesión') }}
                    </b>
                </div>
                <div class="card-body">
                    <div class="m-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="p-1">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="EMail">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <b>
                                            {{ $message }}
                                        </b>
                                    </span>
                                @enderror
                            </div>
                            <div class="p-1">
                                <div class="">
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-key"></i>
                                            </span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <b>
                                            {{ $message }}
                                        </b>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex-row">
                                <div class="p-1">
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordarme') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="flex-column">
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('¿Olvidó su contraseña?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Ingresar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
