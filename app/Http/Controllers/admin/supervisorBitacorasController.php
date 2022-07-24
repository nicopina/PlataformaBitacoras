<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class supervisorBitacorasController extends Controller
{
    public function bitacoras(){
        return view('admin.supervisor.bitacoras');
    }
    public function bitacorasUsuarios($id){
        $fecha = Crypt::decrypt($id);
        return view('admin.supervisor.bitacorasUsuarios',compact('fecha'));
    }
    public function bitacorasUsuariosVer($idU,$idB){
        $usuario = User::find(Crypt::decrypt($idU));
        // return $user;
        $bitacora = Crypt::decrypt($idB);
        // return $entradas;
        $fecha = Bitacora::where('ID_Bitacora','=',Crypt::decrypt($idB))->get()[0];
        // return $fecha;
        return view('admin.supervisor.bitacorasUsuariosVer',compact('usuario','bitacora','fecha'));
    }
}
