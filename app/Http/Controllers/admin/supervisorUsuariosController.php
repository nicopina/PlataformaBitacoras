<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class supervisorUsuariosController extends Controller
{
    
    public function usuarios(){
        return view('admin.supervisor.usuarios');
    }
    public function usuariosBitas($id){
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        return view('admin.supervisor.usuariosBitacoras',compact('user'));
    }
    public function usuariosBitasVer($idU,$idB){
        $user = User::find(Crypt::decrypt($idU));
        $bitacora = Bitacora::where('ID_Bitacora','=',Crypt::decrypt($idB))->get()[0];
        return view('admin.supervisor.usuariosBitacorasVer',compact('user','bitacora'));
    }

}
