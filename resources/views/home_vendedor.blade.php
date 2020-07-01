@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <br>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <div class="md" style="text-align: center">
                        <strong>
                            Menú de vendedor
                        </strong>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <br>
                                <div class="row">
                                    <a id="emb_pend" class="btn btn-primary" href="{{route('regCliente')}}" role="button" style="width:100%">
                                        Registrar cliente
                                    </a>
                                </div>
                                <br>
                                <div class="row">
                                    <a id="emb_hist" class="btn btn-primary" href="{{route('regAlquiler')}}" role="button" style="width:100%">
                                        Registrar alquiler
                                    </a>
                                </div>
                                <br>
                                <div class="row">
                                    <a id="emb_hist" class="btn btn-primary" href="{{route('cierreAlquiler')}}" role="button" style="width:100%">
                                        Cierre de alquiler
                                    </a>
                                </div>
                                <br>
                                <div class="row">
                                    <a id="emb_pend" class="btn btn-primary" href="{{route('consClientes')}}" role="button" style="width:100%">
                                        Revisión de clientes
                                    </a>
                                </div>
                                <br>
                                <div class="row">
                                    <a id="emb_hist" class="btn btn-primary" href="{{route('consAutos')}}" role="button" style="width:100%">
                                        Revisión de automóviles
                                    </a>
                                </div>
                                <br>
                                <div class="row">
                                    <a id="emb_hist" class="btn btn-primary" href="{{route('consAlquileres')}}" role="button" style="width:100%">
                                        Revisión de alquileres
                                    </a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
@endsection
