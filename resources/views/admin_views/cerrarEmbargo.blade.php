@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-light">

                <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">
                    <strong>
                        Cierre de un embargo
                    </strong>
                </h4>
                <br>
                <br>
                <form method="POST" action="{{ route('verificarEmb') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-address-book-o"></i> </span>
                            </div>
                            <input name="id" class="form-control" placeholder="ID del embargo" pattern="[1-9][0-9]*$">
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Proceder al cierre</button>
                        </div>
                    </div>
                </form>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection
