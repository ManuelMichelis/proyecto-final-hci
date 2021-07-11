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
            <a href="{{ route('home') }}" role="button">
                <i class="fas fa-home"></i>
                &nbsp;
                Inicio
            </a>
        </li>
        <div class="sidenav-div"></div>
        <li>
            <a href="{{route('regAutomovil')}}" role="button">
                <i class="fas fa-car"></i>
                &nbsp;
                Registrar vehículo
            </a>
        </li>
        <li>
            <a href="{{route('adjuntarImg')}}" role="button">
                <i class="far fa-image"></i>
                &nbsp;
                Adjuntar imágen a un vehículo
            </a>
        </li>
        <li>
            <a href="{{route('cerrarEmbargo')}}" role="button">
                <i class="fas fa-car-garage"></i>
                &nbsp;
                Finalizar embargo
            </a>
        </li>
        <div class="sidenav-div"></div>
        <li>
            <a href="{{route('consEmpleados')}}" role="button">
                <i class="fa fa-user-tie"></i>
                &nbsp;
                Revisión de empleados
            </a>
        </li>
        <li>
            <a href="{{route('consUsuarios')}}" role="button">
                <i class="fad fa-user-lock"></i>
                &nbsp;
                Revisión de usuarios
            </a>
        </li>

        <li>
            <a href="{{route('consAutos')}}" role="button">
                <i class="fas fa-warehouse"></i>
                &nbsp;
                Revisión de vehículos
            </a>
        </li>
        <li>
            <a href="{{route('consClientes')}}" role="button">
                <i class="fad fa-users"></i>
                &nbsp;
                Revisión de clientes
            </a>
        </li>
        <li>
            <a href="#opcionesAlq" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-folder-open"></i>
                &nbsp;
                Revisión de alquileres
            </a>
        </li>
        <ul class="collapse list-unstyled" id="opcionesAlq">
            <li>
                <a href="{{route('alqActivos')}}" role="button">
                    <i class="far fa-copy"></i>
                    &nbsp;
                    Alquileres vigentes
                </a>
            </li>
            <li>
                <a href="{{route('alqHistorial')}}" role="button">
                    <i class="fas fa-archive"></i>
                    &nbsp;
                    Historial de alquileres
                </a>
            </li>
        </ul>
        <li>
            <a href="{{route('consEmbargos')}}" role="button">
                <i class="fad fa-car-building"></i>
                &nbsp;
                Revisión de embargos
            </a>
        </li>
        <div class="sidenav-div"></div>

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
