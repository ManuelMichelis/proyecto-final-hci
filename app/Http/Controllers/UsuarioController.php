<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class UsuarioController extends Controller
{
    /**
     * Obtiene todos los clientes registrados y lo suministra a una vista para su visualización
     */
    public function consClientes ()
    {
        $resultados = App\Cliente::all();
        return view('/views_compartidas/consClientes', compact('resultados'));
    }

    /**
     * Obtiene todos los automóviles registrados y lo suministra a una vista para su visualización
     */
    public function consAutos ()
    {
        $resultados = App\Automovil::all();
        return view('/views_compartidas/consAutos', compact('resultados'));
    }

}
