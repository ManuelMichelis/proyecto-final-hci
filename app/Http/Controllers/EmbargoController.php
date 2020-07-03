<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('/repo_views/embActualizados', compact('alquileres'));
    }

    /**
     * Verifica la existencia del embargo pendiente que se desea finalizar, a partir de un ID
     */
    public function verificarEmb (Request $request)
    {
        $id = $request->id;
        $embargo = App\Embargo::where('id',$id)
                    ->where('estado','pendiente')
                    ->get()
                    ->first();
        if ($embargo == null) {
            $tituloOp = 'Cierre de un embargo';
            $descError = 'No existe un embargo pendiente, con ID: '.$id.', registrado en el sistema. Por favor, revise los datos ingresados';
            return view('reporte_error', compact('tituloOp', 'descError'));
        }
        return view('/admin_views/confirmarCierreEmb', compact('embargo','id'));
    }

    /**
     * Cierra un embargo pendiente, seteando su estado como finalizado y liberando al automóvil involucrado
     */
    public function finalizarEmbargo ($id) {
        $embargo = App\Embargo::find($id);
        $embargo->estado = 'finalizado';
        $automovil = $embargo->automovilARecuperar();
        $automovil->estado = 'disponible';
        $automovil->save();
        $embargo->save();
        return redirect()->route('home');
    }

}
