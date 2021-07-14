<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ReglaPatente;
use App\Rules\ReglaNombre;
use App\Rules\ReglaNatural;
use App\Rules\ReglaDinero;
use App;
use Datetime;

class AlquilerController extends Controller
{


    /**
     * Obtiene todos los alquileres activos registrados y lo suministra a una vista para su visualización
     */
    public function alqActivos ()
    {
        $fechaActual = new DateTime;
        $strFecha = $fechaActual->format('d/m/Y H:i:s');
        $resultados = App\Alquiler::whereDate('fecha_expiracion','>',$strFecha)->get();
        return view('/vendedor_views/alq-activos', compact('resultados', 'strFecha'));
    }


    /**
     * Obtiene todos los alquileres registrados y lo suministra a una vista para su visualización
     */
    public function alqHistorial ()
    {
        $resultados = App\Alquiler::all();
        return view('/vendedor_views/alq-historial', compact('resultados'));
    }


    /**
     * Crea un nuevo alquiler, de ser posible, para un cliente y automóvil dados, a partir de un N°y patente
     *  y retorna al home del usuario
     */
    public function crearAlquiler (Request $request)
    {
        $titulo = 'Registro de nuevo alquiler';
        $validacion = $this->validate($request,[
            'N°' => new ReglaNatural,
            'patente' => new ReglaPatente,
            'dias' => new ReglaNatural,
            'costo' => new ReglaDinero
        ]);
        // Obtengo el cliente y verifico si existe
        $nro = $request->N°;
        $cliente = App\Cliente::where('nro', $nro)->first();
        if ($cliente == null)
        {
            $error = 'No existe cliente registrado con ID: '.$nro;
            return view('reporte-fallo')
                ->with('titulo', $titulo)
                ->with('error', $error);
        }
        // Obtengo el automóvil y verifico si existe
        $patente = $request->patente;
        $vehiculo = App\Automovil::where('patente', $patente)->first();
        if ($vehiculo == null)
        {
            $error = 'No existe automóvil registrado con patente: '.$patente;
            return view('reporte-fallo')
                ->with('titulo', $titulo)
                ->with('error', $error);
        }
        else
        {
            // Si el automóvil está disponible, procedo al registro del alquiler
            if ($vehiculo->estaDisponible())
            {
                $dias = $request->dias;
                $fechaActual = new DateTime;
                $strFecha = $fechaActual->format('d/m/Y H:i:s');
                $fechaLimite = DateTime::createFromFormat('d/m/Y H:i:s', $strFecha);
                $fechaLimite->modify('+'.$dias.' days');
                $alquiler = new App\Alquiler;
                $alquiler->fecha_inicio = $fechaActual;
                $alquiler->fecha_expiracion = $fechaLimite;
                $alquiler->estado_al_cierre = 'sin devolucion';
                $alquiler->costo = $request->costo;
                $alquiler->save();
                $vendedor = auth()->user()->empleado;
                $alquiler->vendedorACargo()->associate($vendedor);
                $alquiler->cliente()->associate($cliente);
                $alquiler->vehiculo()->associate($vehiculo);
                $vehiculo->estado = 'adquirido';
                $alquiler->save();
                $vehiculo->save();
                $reporte = 'Se ha registrado un alquiler para el cliente con N° '.$nro.', por el vehículo con patente '.$patente;
                return view('reporte-exito')
                    ->with('titulo', $titulo)
                    ->with('reporte', $reporte);
            }
            else
            {
                $error = 'El automóvil registrado con patente: '.$patente.' no está disponible para ser alquilado';
                return view('reporte-fallo')
                    ->with('titulo', $titulo)
                    ->with('error', $error);
            }
        }
    }


    /**
     * Verifica la existencia del alquiler activo que se desea finalizar, a partir de un ID
     */
    public function verificarAlq (Request $request) {
        $validacion = $this->validate($request,[
            'id' => new ReglaNatural,
        ]);
        $id = $request->id;
        $strFecha = now()->format('d/m/Y, H:i');
        $alquiler = App\Alquiler::where('id', $id)
                    ->whereDate('fecha_expiracion','>',$strFecha)
                    ->get()
                    ->first();
        if ($alquiler == null) {
            $titulo = 'Finalización de un alquiler';
            $error = 'No existe un alquiler activo, con ID: '.$id.', registrado en el sistema';
            return view('reporte-fallo')
                ->with('titulo', $titulo)
                ->with('error', $error);
        }
        return view('/vendedor_views/confirmar-cierre-alq')
            ->with('id', $id)
            ->with('alquiler', $alquiler);
    }


    /**
     * Cierra un alquiler activo, seteando la fecha de expiración por su cierre y liberando el automóvil
     */
    public function concretarCierreAlq ($id) {
        $alquiler = App\Alquiler::where('id', $id)->first();
        $vehiculo = $alquiler->vehiculo;
        $cliente = $alquiler->cliente;
        // Seteo el estado del alquiler al cierre, el estado del vehículo y la fecha de expiración
        $alquiler->estado_al_cierre = 'con devolucion';
        $vehiculo->estado = "disponible";
        $vehiculo->save();
        $fechaActual = new DateTime;
        $strFecha = $fechaActual->format('d/m/Y H:i:s');
        $alquiler->save();
        // Reporto el éxito de la operación
        $titulo = "Finalización de un alquiler";
        $reporte = 'Se cerró el alquiler '.$id.', por un vehículo '.
            $vehiculo->nombre().' (Patente: '.$vehiculo->patente.')';
        return view('reporte-exito')
            ->with('titulo', $titulo)
            ->with('reporte', $reporte);
    }

}
