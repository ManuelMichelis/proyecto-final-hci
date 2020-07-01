@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="container section">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <div class="md text-center">
                                    <strong>
                                        Menú de repositor
                                    </strong>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <br>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <a id="emb_pend" class="btn btn-primary" href="{{route('misEmbargos')}}" role="button" style="width:100%">
                                                Mis embargos asignados
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a id="emb_hist" class="btn btn-primary" href="{{route('consEmbargos')}}" role="button" style="width:100%">
                                                Revisión de embargos
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
                                            <a id="emb_pend" class="btn btn-primary" href="{{route('consAutos')}}" role="button" style="width:100%">
                                                Revisión de automóviles
                                            </a>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
