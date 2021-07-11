<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ReglaNatural;
use App;

class EmbargoController extends Controller
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
        return view('/repo_views/mis-embargos',compact('embargos'));
    }

    /**
     * Obtiene todos los embargos registrados y lo suministra a una vista para su visualización
     */
    public function consultarEmbargos ()
    {
        $embargos = App\Embargo::all();
        $stringFecha = now()->format('d/m/Y, H:i');
        return view('/repo_views/consultar-embargos')
            ->with('embargos', $embargos)
            ->with('strFecha', $stringFecha);
    }

    /**
     * Verifica si hay alquileres expirados, sin devolución ni embargo asociado, y crea embargos correspondientes
     */
    public function actualizarEmb ()
    {
        $stringFecha = now()->format('Y-m-d H:i:s');
        // Obtengo alquileres vencidos, sin devolución, y que no tienen una orden de embargo asociada
        $alquileres = App\Alquiler::where('estado_al_cierre', 'sin devolucion')
                    ->whereNull('id_embargo_asociado')
                    ->whereDate('fecha_expiracion','<=',$stringFecha)
                    ->get();
        // Obtengo todos los usuarios de tipo 'repositor'
        $usuariosRepo = App\User::where('type', 'repositor')->get();
        // Por cada alquiler obtenido con ests
        foreach ($alquileres as $alq) {
            $repositor = $usuariosRepo->random()->empleado;
            $embargo = new App\Embargo;
            $embargo->estado = 'pendiente';
            $embargo->legajo_repositor = $repositor->legajo;
            $embargo->id_alquiler_incumplido = $alq->id;
            $id_emb = $embargo->save();
            $alq->id_embargo_asociado = $id_emb;
            $alq->save();
        }
        return view('/repo_views/embargos-actualizados')
            ->with('alquileres', $alquileres);
    }

    /**
     * Verifica la existencia del embargo pendiente que se desea finalizar, a partir de un ID
     */
    public function verificarEmb (Request $request)
    {
        $validacion = $this->validate($request,[
            "id" => new ReglaNatural,
        ]);
        $id = $request->id;
        $embargo = App\Embargo::where('id',$id)
                    ->where('estado','pendiente')
                    ->get()
                    ->first();
        if ($embargo == null) {
            $titulo = 'Finalización de un embargo';
            $error = 'No existe embargo pendiente con ID: '.$id.' registrado en el sistema';
            return view('reporte_error')
                ->with('titulo', $titulo)
                ->with('error', $error);
        }
        $vehiculoARecuperar = $embargo->vehiculoARecuperar();
        $clienteInvolucrado = $embargo->clienteInvolucrado();
        return view('/admin_views/confirmar-cierre-emb')
            ->with('embargo', $embargo)
            ->with('id', $id)
            ->with('vehiculo', $vehiculoARecuperar)
            ->with('cliente', $clienteInvolucrado);
    }

    /**
     * Cierra un embargo pendiente, seteando su estado como finalizado y liberando al vehículo involucrado
     */
    public function concretarCierreEmb ($id) {
        $embargo = App\Embargo::find($id);
        /*
        // Seteo el estado de finalización para el embargo y el estado del vehículo
        $embargo->estado = 'finalizado';
        */
        $vehiculo = $embargo->vehiculoARecuperar();
        /*
        $vehiculo->estado = 'disponible';
        $vehiculo->save();
        $embargo->save();
        // Reporto el éxito de la operación
        */
        $alquiler = $embargo->alquilerIncumplido;
        $titulo = "Finalización de un embargo";
        $reporte = 'Se cerró el embargo con ID: '.$id.' realizado sobre el alquiler de ID: '.
            $alquiler->id.'. Se recuperó un vehículo '.$vehiculo->nombre().' con patente '.$vehiculo->patente;
        return view('reporte-exito')
            ->with('titulo', $titulo)
            ->with('reporte', $reporte);
    }

}
