<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class EmpleadoController extends Controller
{
    /**
     * Obtiene todos los empleados registrados y lo suministra a una vista para su visualización
     */
    public function consultarEmpleados () {
        $resultados = App\Empleado::all();
        return view('admin_views/consultar-empleados')
            ->with('resultados', $resultados);
    }
}
