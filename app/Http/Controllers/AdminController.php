<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
     * Permite la visualización de la vista para adjuntar una foto a un automóvil particular
     */
    public function adjuntarImgAuto () {
        return view('admin_views/adjuntarImg');
    }

    /**
     * Permite la visualización de la vista para el cierre de un embargo
     */
    public function cerrarEmbargo ()
    {
        return view('admin_views/cerrarEmbargo');
    }

}
