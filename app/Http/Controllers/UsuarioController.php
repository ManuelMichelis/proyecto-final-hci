<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class UsuarioController extends Controller
{

    /**
     * Obtiene todos los usuarios registrados y lo suministra a una vista para su visualización
     */
    public function consUsuarios () {
        $resultados = App\User::all();
        return view('admin_views/consUsuarios', compact('resultados'));
    }

}
