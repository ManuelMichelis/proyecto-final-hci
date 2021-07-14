<!-- Sidenav  -->
<nav id="sidenav">
    <div class="sidenav-header">
        <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center">
                <h5>
                    <b>
                        {{ Auth::user()->rol() }}
                    </b>
                </h5>
            </div>
        </div>
    </div>
    <!-- Inicio del menú 'Administrador' -->
    <ul class="list-unstyled components">
        <li>
            <a href="{{route('home')}}" role="button">
                <i class="fas fa-home fa-2x"></i>
                &nbsp;
                Inicio
            </a>
        </li>
        <div class="sidenav-div"></div>
        <li>
            <a href="{{route('regCliente')}}" role="button">
                <i class="fas fa-user fa-2x"></i>
                &nbsp;
                Registrar cliente
            </a>
        </li>
        <li>
            <a href="{{route('regAlquiler')}}" role="button">
                <i class="far fa-calendar-edit fa-2x"></i>
                &nbsp;
                Registrar alquiler
            </a>
        </li>
        <li>
            <a href="{{route('cierreAlquiler')}}" role="button">
                <i class="far fa-calendar-times fa-2x"></i>
                &nbsp;
                Finalizar alquiler
            </a>
        </li>
        <div class="sidenav-div"></div>
        <li>
            <a href="{{route('consClientes')}}" role="button">
                <i class="fad fa-user-friends fa-2x"></i>
                &nbsp;
                Revisión de clientes
            </a>
        </li>
        <li>
            <a href="{{route('consAutos')}}" role="button">
                <i class="fas fa-warehouse fa-2x"></i>
                &nbsp;
                Revisión de vehículos
            </a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-folder-open fa-2x"></i>
                &nbsp;
                Revisión de alquileres
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{route('alqActivos')}}" role="button">
                        <i class="far fa-copy"></i>
                        &nbsp;
                        Alquileres vigentes
                    </a>
                </li>
                <li>
                    <a href="{{route('alqHistorial')}}" role="button">
                        <i class="far fa-archive"></i>
                        &nbsp;
                        Historial de alquileres
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- FIN DEL MENU DEL ADMINISTRADOR -->
</nav>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidenav").mCustomScrollbar({
            theme: "minimal"
        });
        $('#sidenav-btn').on('click', function () {
            $('#sidenav, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=false]').attr('aria-expanded', 'false');
        });
    });
</script>
<!-- Fin del Sidenav -->
