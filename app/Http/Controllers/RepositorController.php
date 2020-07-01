<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use App;
use Ds\Collection;

class RepositorController extends Controller
{
    /**
     * Obtiene todos los embargos asignados al repositor y lo suministra a una vista para su visualización
     */
    public function misEmbargos ()
    {
        $usuario = auth()->user();
        $embargos = App\Embargo::where('legajo_repositor', '=', $usuario->legajo_empleado)
                    ->where('estado','=','pendiente')
                    ->get();
        return view('/repo_views/misEmbargos',compact('embargos'));
    }

    /**
     * Obtiene todos los embargos registrados y lo suministra a una vista para su visualización
     */
    public function consEmbargos ()
    {
        $embargos = App\Embargo::all();
        return view('/repo_views/consEmbargos',compact('embargos'));
    }

}
