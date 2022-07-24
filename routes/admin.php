<?php

use App\Http\Controllers\admin\adminAreasController;
use App\Http\Controllers\admin\adminBitacorasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\adminUserController;
use App\Http\Controllers\admin\supervisorBitacorasController;
use App\Http\Controllers\admin\supervisorUsuariosController;
use App\Http\Controllers\admin\usuarioBitacorasController;
use App\Http\Controllers\admin\usuarioEntradasController;

Route::get('', [AdminController::class, 'index']);

//Admin
Route::resource('Usuarios',adminUserController::class)->names('admin.users');
Route::get('Usuarios/Bitacora/{id}',[adminUserController::class,'bitacora'])->name('admin.users.bitacora');
Route::get('Usuarios/Bitacora/Ver/{id}',[adminUserController::class,'bitacora_ver'])->name('admin.users.bitacora.ver');
Route::resource('Areas',adminAreasController::class)->names('admin.areas');
Route::resource('Adm/Bitacoras',adminBitacorasController::class)->names('admin.bitacoras');
Route::get('Adm/Bitacoras/{idU}/{idB}',[adminBitacorasController::class,'show2'])->name('admin.bitacoras.ver');

//Usuarios
Route::resource('Bitacoras',usuarioBitacorasController::class)->names('usuario.bitacoras');
Route::resource('Entradas',usuarioEntradasController::class)->names('usuario.entradas');
Route::get('Entradas/Ver/{bitacora}', [usuarioEntradasController::class, 'ver'])->name('usuario.entradas.ver');

//Supervisor
Route::get('Sup/Usuarios', [supervisorUsuariosController::class, 'usuarios'])->name('supervisor.usuarios');
Route::get('Sup/Usuarios/Bitacoras/{id}', [supervisorUsuariosController::class, 'usuariosBitas'])->name('supervisor.usuarios.bitas');
Route::get('Sup/Usuarios/Bitacoras/Ver/{idU}/{idB}', [supervisorUsuariosController::class, 'usuariosBitasVer'])->name('supervisor.usuarios.bitas.ver');
Route::get('Sup/Bitacoras', [supervisorBitacorasController::class, 'bitacoras'])->name('supervisor.bitacoras');
Route::get('Sup/Bitacoras/Usuarios/{id}', [supervisorBitacorasController::class, 'bitacorasUsuarios'])->name('supervisor.bitacoras.usuarios');
Route::get('Sup/Bitacoras/Usuarios/Ver/{idU}/{idB}', [supervisorBitacorasController::class, 'bitacorasUsuariosVer'])->name('supervisor.bitacoras.usuarios.ver');