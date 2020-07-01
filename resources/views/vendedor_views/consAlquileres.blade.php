@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="container section">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="md" style="text-align: center">
                                Consultas por alquileres
                            </div>
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
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="row">
                                            <a id="emb_pend" class="btn btn-primary" href="{{route('alqActivos')}}" role="button" style="width:100%">
                                                Alquileres activos
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a id="emb_pend" class="btn btn-primary" href="{{route('alqHistorial')}}" role="button" style="width:100%">
                                                Historial de alquileres
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
