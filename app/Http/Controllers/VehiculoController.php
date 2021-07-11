<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Rules\ReglaPatente;
use App\Rules\ReglaNombre;
use App\Rules\ReglaVersion;
use App\Rules\ReglaDinero;
use App\Rules\ReglaImagen;
use App;

class VehiculoController extends Controller
{
    /**
     * Crea un nuevo automóvil, a partir de datos suministrados y retorna al home del usuario
     */
    public function crear (Request $request)
    {
        // Aplico la validación de las entradas
        $validacion = $this->validate($request,
        [
            'patente' => new ReglaPatente,
            'marca' => new ReglaNombre,
            'modelo' => new ReglaNombre,
            'version' => new ReglaVersion,
            'color' => new ReglaNombre,
            'valor' => new ReglaDinero,
        ]);
        // Verifico si ya existe vehículo registrado con la patente ingresada
        $patente = $request ->patente;
        $registrado = App\Automovil::where('patente', $patente)->first();
        // Si está registrado, notifico el error; si no, registro el nuevo vehículo
        if ($registrado != null)
        {
            return view('reporte-fallo')
                ->with('titulo', 'Registro de nuevo vehículo')
                ->with('error', 'Ya existe un vehículo registrado con patente '.$patente);
        }
        else {
            $vehiculo = new App\Automovil;
            $vehiculo->patente = $request->patente;
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->version = $request->version;
            $vehiculo->color = $request->color;
            $vehiculo->valor = $request->valor;
            $vehiculo->estado = 'disponible';
            $vehiculo->save();
            return view('reporte-exito')
                ->with('titulo', 'Registro de nuevo vehículo')
                ->with('reporte', 'Se ha registrado un nuevo vehículo con patente '.$patente);
        }
    }

    /**
     * Obtiene todos los automóviles registrados y lo suministra a una vista para su visualización
     */
    public function consultarVehiculos ()
    {
        $resultados = App\Automovil::all();
        return view('/views_compartidas/consultar-vehiculos')
            ->with('resultados', $resultados);
    }

    /**
     * Guarda, para un dado automóvil, una imágen que lo identifica
     */
    public function adjuntarImg (Request $request)
    {
        $patente = $request->patente;
        $reporte = null;
        // Valido argumentos. Si 'imagen' es indefinido, se adjuntará nulo al vehículo, si existe
        $validacion = $this->validate($request,
        [
            'patente' => new ReglaPatente,
            'imagen' => new ReglaImagen,
        ]);
        // Recupero el vehículo correspondiente y verifico si existe o no
        $vehiculo = App\Automovil::where('patente', $patente)->first();
        $titulo = 'Adjuntar imágen a un automóvil';
        if ($vehiculo == null)
        {
            $reporte = 'No existe vehículo registrado con patente: '.$patente;
            return view('reporte-fallo')
                ->with('titulo', $titulo)
                ->with('error', $reporte);
        }
        else {
            $imagenNueva = $request->imagen;
            // Si el request tiene en 'imagen' un archivo, lo recupero y lo obtengo como imagen en b64
            if ($request->hasFile('imagen'))
            {
                $imagenNueva = base64_encode(file_get_contents($request->file('imagen')));
            }
            $vehiculo->imagen = $imagenNueva;
            $vehiculo->save();
            // Determino el reporte correspondiente según cuál sea la imágen nueva y cuál fue la anterior
            if ($imagenNueva == null) {
                $reporte = 'Se adjuntó una imágen vacía al vehículo registrado con patente '.$patente;
            }
            else {
                $reporte = 'Se adjuntó una nueva imágen al vehículo registrado con patente '.$patente;
            }
            return view('reporte-exito')
                ->with('titulo', $titulo)
                ->with('reporte', $reporte);
        }
    }

}
