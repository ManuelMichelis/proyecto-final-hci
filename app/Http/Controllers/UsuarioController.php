<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class UsuarioController extends Controller
{

    /**
     * Obtiene todos los usuarios registrados y lo suministra a una vista para su visualización
     */
    public function consultarUsuarios () {
        $resultados = App\User::all();
        return view('admin_views/consultar-usuarios')
            ->with('resultados', $resultados);
    }

}
