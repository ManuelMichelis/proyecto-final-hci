<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Permite la visualización de la vista para el registro de un nuevo cliente
     */
    public function regCliente ()
    {
        return view('/vendedor_views/regCliente');
    }

    /**
     * Permite la visualización de la vista para seleccionar una consulta particular sobre alquileres
     */
    public function consAlquileres ()
    {
        return view('/vendedor_views/consAlquileres');
    }

    /**
     * Permite la visualización de la vista para el registro de un nuevo alquiler
     */
    public function regAlquiler ()
    {
        return view('/vendedor_views/regAlquiler');
    }

    /**
     * Permite la visualización de la vista para el cierre de un alquiler
     */
    public function cierreAlquiler ()
    {
        return view('/vendedor_views/cerrarAlquiler');
    }

}
