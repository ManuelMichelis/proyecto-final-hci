@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="container section">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="md" style="text-align: center">
                                <strong>
                                    Menú de administración
                                </strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('regAutomovil')}}" role="button" style="width:100%">
                                                Registrar automóvil
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('adjuntarImg')}}" role="button" style="width:100%">
                                                Adjuntar imágen a automóvil
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('consUsuarios')}}" role="button" style="width:100%">
                                                Revisión de usuarios
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('consEmpleados')}}" role="button" style="width:100%">
                                                Revisión de empleados
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('consAutos')}}" role="button" style="width:100%">
                                                Revisión de automóviles
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('consClientes')}}" role="button" style="width:100%">
                                                Revisión de clientes
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('consEmbargos')}}" role="button" style="width:100%">
                                                Revisión de embargos
                                            </a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <a class="btn btn-primary" href="{{route('cerrarEmbargo')}}" role="button" style="width:100%">
                                                Cierre de embargo
                                            </a>
                                        </div>
                                        <br>
                                    </div>
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
