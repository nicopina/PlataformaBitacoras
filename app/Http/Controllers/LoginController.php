<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    
    public function login() {
        return view('Login');
    }
    public function checklogin(Request $request){
        $userdata=array(
            'ID'=>$request->get.('ID'),
            'Contraseña'=>$request->get.('Contraseña')
        );
        if(Auth::attempt($userdata)){
            return redirect('login/aceptado');
        }else{
            return back()->with('error','Credenciales inválidas');
        }
    }
}
