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

// Para usuario ADMINISTRADOR...
Route::get('/home/registrar_automovil', 'AdminController@regAutomovil')->name('regAutomovil')->middleware('es_admin');
Route::post('/home/registrar_automovil', 'AdminController@crearAuto')->name('crearAuto')->middleware('es_admin');
Route::get('/home/imagen_automovil', 'AdminController@adjuntarImg')->name('adjuntarImg')->middleware('es_admin');
Route::post('/home/imagen_automovil', 'AdminController@guardarImg')->name('guardarImg')->middleware('es_admin');
Route::get('/home/revision_usuarios', 'AdminController@consUsuarios')->name('consUsuarios')->middleware('es_admin');
Route::get('/home/revision_empleados', 'AdminController@consEmpleados')->name('consEmpleados')->middleware('es_admin');
Route::get('/home/cambiar_estado', 'AdminController@cambiarEstado')->name('cambiarEstado')->middleware('es_admin');
Route::get('/home/cerrar_embargo', 'AdminController@cerrarEmbargo')->name('cerrarEmbargo')->middleware('es_admin');
Route::post('/home/cerrar_embargo/confirmar', 'AdminController@verificarEmb')->name('verificarEmb')->middleware('es_admin');
Route::post('/home/cerrar_embargo/confirmar/id={id}', 'AdminController@finalizarEmbargo')->name('finalizarEmbargo')->middleware('es_admin');

// Para usuario VENDEDOR...

Route::get('/home/revision_alquileres', 'VendedorController@consAlquileres')->name('consAlquileres')->middleware('es_vendedor');
Route::get('/home/revision_alquileres/activos', 'VendedorController@alqActivos')->name('alqActivos')->middleware('es_vendedor');
Route::get('/home/revision_alquileres/historial', 'VendedorController@alqHistorial')->name('alqHistorial')->middleware('es_vendedor');
Route::get('/home/registrar_cliente', 'VendedorController@regCliente')->name('regCliente')->middleware('es_vendedor');
Route::post('/home/registrar_cliente','VendedorController@crearCliente')->name('crearCliente')->middleware('es_vendedor');
Route::get('/home/registrar_alquiler', 'VendedorController@regAlquiler')->name('regAlquiler')->middleware('es_vendedor');
Route::post('/home/registrar_alquiler', 'VendedorController@crearAlquiler')->name('crearAlquiler')->middleware('es_vendedor');
Route::get('/home/cierre_alquiler', 'VendedorController@cierreAlquiler')->name('cierreAlquiler')->middleware('es_vendedor');
Route::post('/home/cerrar_alquiler/confirmar', 'VendedorController@verificarAlq')->name('verificarAlq')->middleware('es_vendedor');
Route::post('/home/cerrar_alquiler/confirmar/id={id}', 'VendedorController@finalizarAlquiler')->name('finalizarAlquiler')->middleware('es_vendedor');

// Para usuario REPOSITOR...

Route::get('/home/embargos_asignados', 'RepositorController@misEmbargos')->name('misEmbargos')->middleware('es_repositor');
Route::get('/home/revision_embargos', 'RepositorController@consEmbargos')->name('consEmbargos')->middleware('es_repo_admin');


// RUTAS COMPARTIDAS POR TODOS LOS USUARIOS

Route::get('/home/revision_clientes', 'UsuarioController@consClientes')->name('consClientes')->middleware('esta_autenticado');
Route::get('/home/revision_autos', 'UsuarioController@consAutos')->name('consAutos')->middleware('esta_autenticado');
