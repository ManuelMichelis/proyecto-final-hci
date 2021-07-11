<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta base
Route::get('/',function () {
    return view('welcome');
});

// Rutas generadas por Laravel
Auth::routes();

// Entrada al home en base al rol correspondiente
Route::get('/home', 'HomeController@index')->name('home');


// RUTAS PROPIAS DEL ADMINISTRADOR

Route::middleware(['es_admin'])->group(function () {
    Route::get('/vehiculo/nuevo', 'AdminController@regAutomovil')->name('regAutomovil');
    Route::get('/vehiculo/adjuntar', 'AdminController@adjuntarImg')->name('adjuntarImg');
    Route::get('/embargo/cierre', 'AdminController@cerrarEmbargo')->name('cerrarEmbargo');

    Route::post('/vehiculo/nuevo', 'VehiculoController@crear')->name('crearAuto');
    Route::post('/vehiculo/adjuntar', 'VehiculoController@adjuntarImg')->name('adjuntarImg');
    Route::get('/usuario/todos', 'UsuarioController@consultarUsuarios')->name('consUsuarios');
    Route::get('/empleado/todos', 'EmpleadoController@consultarEmpleados')->name('consEmpleados');
    Route::post('/embargo/cierre', 'EmbargoController@verificarEmb')->name('verificarEmb');
    Route::post('/embargo/cierre/confirmar:{id}', 'EmbargoController@concretarCierreEmb')->name('concretarCierreEmb');
});

// RUTAS PROPIAS DEL VENDEDOR

Route::middleware(['es_vendedor'])->group(function () {
    Route::get('/alquiler', 'VendedorController@consAlquileres')->name('consAlquileres');
    Route::get('/cliente/nuevo', 'VendedorController@regCliente')->name('regCliente');
    Route::get('/alquiler/cierre', 'VendedorController@cierreAlquiler')->name('cierreAlquiler');
    Route::get('/alquiler/nuevo', 'VendedorController@regAlquiler')->name('regAlquiler');
    Route::post('/alquiler/nuevo', 'AlquilerController@crearAlquiler')->name('crearAlquiler');
    Route::post('/alquiler/cierre', 'AlquilerController@verificarAlq')->name('verificarAlq');
    Route::post('/alquiler/cierre/confirmar:{id}', 'AlquilerController@concretarCierreAlq')->name('concretarCierreAlq');
    Route::post('/cliente/nuevo','ClienteController@crearCliente')->name('crearCliente');
});

// RUTAS PROPIAS DEL REPOSITOR

Route::middleware(['es_repositor'])->group(function () {
    Route::get('/embargos/asignados', 'EmbargoController@misEmbargos')->name('misEmbargos');
    Route::get('/embargos/control', 'EmbargoController@actualizarEmb')->name('actualizarEmb');
});

// RUTAS COMPARTIDAS REPOSITOR-ADMINISTRADOR

Route::middleware(['es_repo_admin'])->group(function () {
    Route::get('/embargos/todos', 'EmbargoController@consultarEmbargos')->name('consEmbargos');
});

// RUTAS COMPARTIDAS POR TODOS LOS USUARIOS

Route::middleware(['esta_autenticado'])->group(function () {
    Route::get('/cliente/todos', 'ClienteController@consultarClientes')->name('consClientes');
    Route::get('/vehiculo/todos', 'VehiculoController@consultarVehiculos')->name('consAutos');
    Route::get('alquiler/activos', 'AlquilerController@alqActivos')->name('alqActivos');
    Route::get('/alquiler/todos', 'AlquilerController@alqHistorial')->name('alqHistorial');
});





