<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function login() {
        return view('Login');
    }

    public function store(){
        if(auth()->attempt(request(['ID','Contraseña'])) == 'true'){
            return back()->withErrors([
                'message' => 'Credencialesn inválidas'
            ]);
        }
        return redirect()->to('/inicio');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
