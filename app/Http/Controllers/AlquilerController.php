<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $strFecha = $fechaActual->format('Y-m-d H:i:s');
        $resultados = App\Alquiler::whereDate('fecha_expiracion','>',$strFecha)->get();
        return view('/vendedor_views/alquileresAct', compact('resultados', 'strFecha'));
    }

    /**
     * Obtiene todos los alquileres registrados y lo suministra a una vista para su visualización
     */
    public function alqHistorial ()
    {
        $resultados = App\Alquiler::all();
        return view('/vendedor_views/alquileresHist', compact('resultados'));
    }

    /**
     * Crea un nuevo alquiler, de ser posible, para un cliente y automóvil dados, a partir de un N°y patente
     *  y retorna al home del usuario
     */
    public function crearAlquiler (Request $request)
    {
        // Obtengo el cliente y verifico si existe
        $cliente = App\Cliente::where('nro',$request->nro)->get()->first();
        $tituloOp = 'Registro de nuevo alquiler';
        if ($cliente == null)
        {
            $descError = 'No existe cliente registrado con ID: '.$request->nro.' Por favor, revise los datos ingresados';
            return view('reporte_error', compact('tituloOp', 'descError'));
        }
        // Obtengo el automóvil y verifico si existe
        $automovil = App\Automovil::where('patente',$request->patente)->get()->first();
        if ($automovil == null)
        {
            $descError = 'No existe automóvil registrado con patente: '.$request->patente.'. Por favor, revise los datos ingresados';
            return view('reporte_error', compact('tituloOp', 'descError'));
        }
        else
        {
            // Si el automóvil está disponible, procedo al registro del alquiler
            if ($automovil->estaDisponible())
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
                $alquiler->cliente()->associate($cliente);
                $alquiler->automovil()->associate($automovil);
                $automovil->estado = 'adquirido';
                $alquiler->save();
                $automovil->save();
                return redirect()->route('home');
            }
            else
            {
                $descError = 'El automóvil registrado con patente: '.$request->patente.' pertenece a un alquiler vigente. Por favor, revise los datos ingresados';
                return view('reporte_error', compact('tituloOp', 'descError'));
            }
        }
    }

    /**
     * Verifica la existencia del alquiler activo que se desea finalizar, a partir de un ID
     */
    public function verificarAlq (Request $request) {
        $id = $request->id;
        $fechaActual = new DateTime();
        $strFecha = $fechaActual->format('d/m/Y H:i:s');
        $alquiler = App\Alquiler::where('id',$id)
                    ->whereDate('fecha_expiracion','>',$strFecha)
                    ->get()
                    ->first();
        if ($alquiler == null) {
            $tituloOp = 'Cierre de alquiler para un cliente';
            $descError = 'No existe un alquiler activo, con ID: '.$id.', registrado en el sistema. Por favor, revise los datos ingresados';
            return view('reporte_error', compact('tituloOp', 'descError'));
        }
        return view('/vendedor_views/confirmarCierreAlq', compact('alquiler','id'));
    }

    /**
     * Cierra un alquiler activo, seteando la fecha de expiración por su cierre y liberando el automóvil
     */
    public function finalizarAlquiler ($id) {
        $alquiler = App\Alquiler::find($id);
        $automovil = $alquiler->automovil;
        $alquiler->estado_al_cierre = 'con devolucion';
        $automovil->estado = "disponible";
        $automovil->save();
        $alquiler->fecha_expiracion = new DateTime;
        $alquiler->save();
        return redirect()->route('home');
    }

}
