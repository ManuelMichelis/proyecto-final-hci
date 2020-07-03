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
    Route::get('/home/registrar_automovil', 'AdminController@regAutomovil')->name('regAutomovil');
    Route::get('/home/imagen_automovil', 'AdminController@adjuntarImgAuto')->name('adjuntarImg');
    Route::get('/home/cerrar_embargo', 'AdminController@cerrarEmbargo')->name('cerrarEmbargo');

    Route::post('/home/registrar_automovil', 'AutomovilController@crearAuto')->name('crearAuto');
    Route::post('/home/imagen_automovil', 'AutomovilController@guardarImgAuto')->name('guardarImg');
    Route::get('/home/revision_usuarios', 'UsuarioController@consUsuarios')->name('consUsuarios');
    Route::get('/home/revision_empleados', 'EmpleadoController@consEmpleados')->name('consEmpleados');
    Route::post('/home/cerrar_embargo/confirmar', 'EmbargoController@verificarEmb')->name('verificarEmb');
    Route::post('/home/cerrar_embargo/confirmar/id={id}', 'EmbargoController@finalizarEmbargo')->name('finalizarEmbargo');
});

// RUTAS PROPIAS DEL VENDEDOR

Route::middleware(['es_vendedor'])->group(function () {
    Route::get('/home/revision_alquileres', 'VendedorController@consAlquileres')->name('consAlquileres');
    Route::get('/home/registrar_cliente', 'VendedorController@regCliente')->name('regCliente');
    Route::get('/home/cierre_alquiler', 'VendedorController@cierreAlquiler')->name('cierreAlquiler');
    Route::get('/home/registrar_alquiler', 'VendedorController@regAlquiler')->name('regAlquiler');

    Route::get('/home/revision_alquileres/activos', 'AlquilerController@alqActivos')->name('alqActivos');
    Route::get('/home/revision_alquileres/historial', 'AlquilerController@alqHistorial')->name('alqHistorial');
    Route::post('/home/registrar_alquiler', 'AlquilerController@crearAlquiler')->name('crearAlquiler');
    Route::post('/home/cerrar_alquiler/confirmar', 'AlquilerController@verificarAlq')->name('verificarAlq');
    Route::post('/home/cerrar_alquiler/confirmar/id={id}', 'AlquilerController@finalizarAlquiler')->name('finalizarAlquiler');
    Route::post('/home/registrar_cliente','ClienteController@crearCliente')->name('crearCliente');
});

// RUTAS PROPIAS DEL REPOSITOR

Route::middleware(['es_repositor'])->group(function () {
    Route::get('/home/embargos_asignados', 'EmbargoController@misEmbargos')->name('misEmbargos');
    Route::get('/home/actualizar_embargos', 'EmbargoController@actualizarEmb')->name('actualizarEmb');
});

// RUTAS COMPARTIDAS REPOSITOR-ADMINISTRADOR

Route::middleware(['es_repo_admin'])->group(function () {
    Route::get('/home/revision_embargos', 'EmbargoController@consEmbargos')->name('consEmbargos');
});

// RUTAS COMPARTIDAS POR TODOS LOS USUARIOS

Route::middleware(['esta_autenticado'])->group(function () {
    Route::get('/home/revision_clientes', 'ClienteController@consClientes')->name('consClientes');
    Route::get('/home/revision_autos', 'AutomovilController@consAutos')->name('consAutos');
});





