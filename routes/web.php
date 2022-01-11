<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
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

Route::get('/', [SessionsController::class,'Login'])->name('login.index');
Route::post('/login', [SessionsController::class,'store'])->name('login.login');
Route::get('/inicio', function(){
    return view('layouts.Inicio');
});