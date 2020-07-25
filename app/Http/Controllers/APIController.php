<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class APIController extends Controller
{
    public function usuarios ()
    {
        try
        {
            $usuarios = App\User::all();

            return response()->json([
                'status_code' => 200,
                'response' => $usuarios
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar los usuarios'
            ]);
        }
    }

    public function empleados ()
    {
        try
        {
            $empleados = App\Empleado::all();

            return response()->json([
                'status_code' => 200,
                'response' => $empleados
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar los empleados'
            ]);
        }
    }

    public function clientes ()
    {
        try
        {
            $clientes = App\Cliente::all();

            return response()->json([
                'status_code' => 200,
                'response' => $clientes
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar los clientes'
            ]);
        }
    }

    public function automoviles ()
    {
        try
        {
            $automoviles = App\Automovil::all();

            return response()->json([
                'status_code' => 200,
                'response' => $automoviles
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar los automoviles'
            ]);
        }
    }

    public function propsAutomoviles ()
    {
        try
        {
            $propiedades = App\Automovil::all()->makeHidden(['created_at','updated_at']);

            return response()->json([
                'status_code' => 200,
                'response' => $propiedades
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar las especificaciones de los automoviles'
            ]);
        }
    }

    public function imagenesAutomoviles ()
    {
        try
        {
            $imagenes = App\Automovil::select('imagen')->get();

            return response()->json([
                'status_code' => 200,
                'response' => $imagenes
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar las imágenes de los automoviles'
            ]);
        }
    }

    public function alquileres ()
    {
        try
        {
            $alquileres = App\Alquiler::all();

            return response()->json([
                'status_code' => 200,
                'response' => $alquileres
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar los alquileres'
            ]);
        }
    }

    public function embargos ()
    {
        try
        {
            $embargos = App\Embargo::all();

            return response()->json([
                'status_code' => 200,
                'response' => $embargos
            ]);
        }
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'response' => '¡Error! No se pudieron recuperar los embargos'
            ]);
        }
    }

}
