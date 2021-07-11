@extends('layouts.app')

@section('content')

<h4 class="card-title mt-0.5 text-center">
    <b>
        Ingrese los datos del alquiler a finalizar
    </b>
</h4>
<div class="m-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="POST" action="{{ route('verificarAlq') }}">
                @csrf
                <div class="m-3">
                    <div class="d-flex justify-content-center">
                        <div class="p-2">
                            <div class="container">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-file-alt"></i>
                                        </span>
                                    </div>
                                    <input name="id" class="form-control" placeholder="ID del alquiler" pattern="[1-9][0-9]*$">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Finalizar alquiler
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
