<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Sunshine Autos') }}
    </title>

    <!-- IMPORTS REQUERIDOS -->
    <!-- Estilos y scripts para Fuentes + Iconos de material design -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Estilos propios -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidenav-styles.css') }}">
    <!-- Estilos de BOOTSTRAP 4 para datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- Scripts propios -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Librerías JS de JQuery + Bootstrap para datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- ESTILOS Y SCRIPTS PARA EL SIDENAV Y MATERIAL DESIGN -->
    <!-- Scrollbar Custom CSS + JQuery scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- FIN DE IMPORTS -->
</head>

<body>
    <div id="app">
        <nav class="navbar-light bg-transparent shadow-sm">
            <div class="container-fluid">
                <div class="mr-auto p-2">
                    <div class="d-flex justify-content-start">
                        @if (Auth::check())
                            <!-- Botón para menú hamburguesa -->
                            <button id="sidenav-btn" class="btn navbar-toggler hamb-button" type="button" data-toggle="collapse" data-target="#barra_menu" aria-controls="barra_menu">
                                <div class="animated-icon1">
                                    <span class="spanHamb"></span>
                                    <span class="spanHamb"></span>
                                    <span class="spanHamb"></span>
                                </div>
                            </button>
                            <!-- Fin del botón para menú hamburguesa -->

                            <!-- Agregación del sidenav según rol del usuario -->
                            @if (Auth::user()->esVendedor())
                                @include('./components/vend-sidenav')
                            @elseif (Auth::user()->esRepositor())
                                @include('./components/repo-sidenav')
                            @elseif (Auth::user()->esAdmin())
                                @include('./components/admin-sidenav')
                            @endif
                            <!-- Fin del sidenav -->
                        @endif
                        <div class="container-fluid">
                            <div class="">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <div class="kaushan">
                                        Sunshine Autos
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div>
                            <!-- Menú de sesión -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <div class="d-flex justify-content-end">
                                        <div class="container">
                                            <a class="nav-link" href="{{ route('login') }}">
                                                {{ __('Ingresar') }}
                                            </a>
                                        </div>
                                        @if (Route::has('register'))
                                            <div class="container">
                                                <a class="nav-link" href="{{ route('register') }}">
                                                    {{ __('Registrarse') }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span>
                                                    <i class="fas fa-user-circle"></i>
                                                </span>
                                                &nbsp;
                                                    {{ Auth::user()->empleado->nombreCompleto() }}
                                                <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <div class="d-flex justify-content-start">
                                                        <div class="d-flex align-items-center">
                                                            <span>
                                                                <i class="fas fa-sign-out-alt"></i>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            &nbsp;
                                                            {{ __('Salir') }}
                                                        </div>
                                                    </div>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <script>
            $(document).ready(function () {
                $('.hamb-button').on('click', function () {

                $('.animated-icon1').toggleClass('open');
                });
            });
        </script>

        <main>
            <div class="m-5">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
