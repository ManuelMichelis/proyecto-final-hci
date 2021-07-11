@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="d-flex text-center" style="vertical-align: middle">
                <h4>
                    ¡ Bienvenido, {{ strtolower(Auth::user()->rol()) }}
                    <b>
                        {{ Auth::user()->empleado->nombreCompleto() }}
                    </b>
                    !
                </h4>
            </div>
        </div>
    </div>

@endsection
