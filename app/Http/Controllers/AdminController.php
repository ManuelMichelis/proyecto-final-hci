<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Permite la visualización de la vista para el registro de un nuevo automóvil
     */
    public function regAutomovil ()
    {
        return view('admin_views/regAutomovil');
    }

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

    public function adjuntarImg () {
        return view('admin_views/adjuntarImg');
    }


    public function guardarImg (Request $request)
    {
        $patente = $request->patente;
        $automovil = App\Automovil::find($patente);
        error_log("Recuperé el automovil");
        if ($automovil == null)
        {
            $tituloOp = 'Adjuntar imágen a un automóvil';
            $descError = 'No existe un automóvil registrado con patente: '.$patente.'. Por favor, revise los datos ingresados';
            return view('reporte_error', compact('tituloOp', 'descError'));
        }
        //dd($request->imagen);
        $request->validate(
            ['imagen' =>'image|mimes:png,jpg,jpeg,bmp'],
            []
        );
        error_log("Validé la imagen");
        $imagen = null;
        if ($request->hasFile('imagen'))
        {
            $imagen = base64_encode(file_get_contents($request->file('imagen')));
        }
        error_log("Codifiqué en base64 y asigné la codificación a la variable local imagen");
        $automovil->imagen = $imagen;
        error_log("Asigné imagen");
        $automovil->save();
        error_log("Guardé todo");

        return redirect()->route('home');
    }

    /**
     * Obtiene todos los usuarios registrados y lo suministra a una vista para su visualización
     */
    public function consUsuarios () {
        $resultados = App\User::all();
        return view('admin_views/consUsuarios', compact('resultados'));
    }

    /**
     * Obtiene todos los empleados registrados y lo suministra a una vista para su visualización
     */
    public function consEmpleados () {
        $resultados = App\Empleado::all();
        return view('admin_views/consEmpleados', compact('resultados'));
    }

    /**
     * Permite la visualización de la vista para el cierre de un embargo
     */
    public function cerrarEmbargo ()
    {
        return view('admin_views/cerrarEmbargo');
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
