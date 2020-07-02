@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-light">
                <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">
                    <strong>
                        Adjuntar imágen a un automóvil
                    </strong>
                </h4>
                <br>
                <br>
                <form method="POST" action="{{ route('guardarImg') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-car"></i> </span>
                        </div>
                        <input name="patente" class="form-control" placeholder="Patente" pattern="[A-Z]{2,2}[0-9]{3,3}[A-Z]{2,2}|[A-Z]{3,3}[0-9]{3,3}">
                    </div>

                    <div class="form-group input group">
                        <input type="file" name="imagen" class="py-2">
                        <div>{{ $errors->first('imagen') }}</div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Guardar imágen </button>
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
