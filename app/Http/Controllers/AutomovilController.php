<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AutomovilController extends Controller
{
    /**
     * Crea un nuevo automóvil, a partir de datos suministrados y retorna al home del usuario
     */
    public function crearAuto (Request $request)
    {
        $automovil = new App\Automovil;
        $automovil->patente = $request->patente;
        $automovil->marca = $request->marca;
        $automovil->modelo = $request->modelo;
        $automovil->version = $request->version;
        $automovil->color = $request->color;
        $automovil->valor = $request->valor;
        $automovil->estado = 'disponible';
        $automovil->save();
        return redirect()->route('home');
    }

    /**
     * Obtiene todos los automóviles registrados y lo suministra a una vista para su visualización
     */
    public function consAutos ()
    {
        $resultados = App\Automovil::all();
        return view('/views_compartidas/consAutos', compact('resultados'));
    }

    /**
     * Guarda, para un dado automóvil, una imágen que lo identifica
     */
    public function guardarImgAuto (Request $request)
    {
        $patente = $request->patente;
        $automovil = App\Automovil::find($patente);
        if ($automovil == null)
        {
            $tituloOp = 'Adjuntar imágen a un automóvil';
            $descError = 'No existe un automóvil registrado con patente: '.$patente.'. Por favor, revise los datos ingresados';
            return view('reporte_error', compact('tituloOp', 'descError'));
        }
        $request->validate(
            ['imagen' =>'image|mimes:png,jpg,jpeg,bmp'],
            []
        );
        $imagen = null;
        if ($request->hasFile('imagen'))
        {
            $imagen = base64_encode(file_get_contents($request->file('imagen')));
        }
        $automovil->imagen = $imagen;
        $automovil->save();

        return redirect()->route('home');
    }

}
