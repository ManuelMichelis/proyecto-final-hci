@extends('layouts.app')

@section('content')

    <h4 class="card-title mt-0.5 text-center">
        <b>
            Ingrese los datos para adjuntar una imágen a un vehículo
        </b>
    </h4>
    <div class="m-5">
            <form method="POST" action="{{ route('adjuntarImg') }}" enctype="multipart/form-data">
                @csrf
                <div class="m-3">
                    <div class="d-flex justify-content-center">
                        <div class="p-2">
                            <div class="container">                           
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> 
                                            <i class="fad fa-credit-card-blank"></i>
                                        </span>
                                    </div>
                                    <input name="patente" class="form-control" placeholder="Patente" pattern="[A-Z]{2,2}[0-9]{3,3}[A-Z]{2,2}|[A-Z]{3,3}[0-9]{3,3}">
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="p-2">
                            <div class="form-group input group">
                                <input type="file" name="imagen" class="">
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Guardar imágen </button>
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

@endsection
