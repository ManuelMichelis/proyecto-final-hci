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
                                    <input name="id" class="form-control" placeholder="ID del alquiler">
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
</div>

@endsection
