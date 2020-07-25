<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Implmentación de rutas INICIAL para la API REST: solicitud de login + consultas 'all' por cada modelo

Route::post('/login', 'Auth\AuthController@login');
Route::get('/propsAutomoviles', 'APIController@propsAutomoviles');
Route::get('/imagenesAutomoviles', 'APIController@imagenesAutomoviles');

Route::middleware('auth:api')->get('/usuarios', 'APIController@usuarios');
Route::middleware('auth:api')->get('/empleados', 'APIController@empleados');
Route::middleware('auth:api')->get('/clientes', 'APIController@clientes');
Route::middleware('auth:api')->get('/automoviles', 'APIController@automoviles');
Route::middleware('auth:api')->get('/alquileres', 'APIController@alquileres');
Route::middleware('auth:api')->get('/embargos', 'APIController@embargos');


