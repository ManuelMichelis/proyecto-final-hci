<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ClienteController extends Controller
{
    /**
     * Obtiene todos los clientes registrados y lo suministra a una vista para su visualización
     */
    public function consultarClientes ()
    {
        $resultados = App\Cliente::all();
        return view('/views_compartidas/consultar-clientes')
            ->with('resultados', $resultados);
    }

    /**
     * Crea un nuevo cliente, a partir de datos suministrados y retorna al home del usuario
     */
    public function crearCliente (Request $request)
    {
        $cliente = new App\Cliente;
        $cliente->DNI = $request->input('DNI');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->localidad = $request->input('localidad');
        $cliente->direccion = $request->input('direccion');
        $cliente->nacionalidad = $request->input('nacionalidad');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->save();
        return redirect()->route('home');
    }

}
