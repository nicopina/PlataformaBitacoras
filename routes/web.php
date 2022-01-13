<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [SessionsController::class,'Login']);
Route::view('/login', 'Login');
Route::post('/login', [SessionsController::class,'store']);

Route::get('/inicio', function(){
    return view('layouts.Inicio');
});

// Usuario
Route::get('/Usuario', [UsuarioController::class,'Inicio']);
Route::get('/Usuario.hoy', [UsuarioController::class,'Hoy']);
Route::post('/Usuario.hoy', [UsuarioController::class,'Ingresar_Entrada']);
Route::delete('/Usuario.hoy/{id}', [UsuarioController::class,'Eliminar_entrada']);
Route::patch('/Usuario.hoy/{id}', [UsuarioController::class,'Editar_entrada']);
Route::get('/Usuario.hoy/{id}', [UsuarioController::class,'Seleccionar_entrada']);
Route::get('/Usuario.bitacoras', [UsuarioController::class,'Bitacoras']);
Route::get('/Usuario.bitacoras/{id}', [UsuarioController::class,'Ver_bitacora']);