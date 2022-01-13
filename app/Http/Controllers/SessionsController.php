<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function login() {
        return redirect()->to('/login');
    }

    public function store(){
        $credentials = request()->only('ID','Contraseña');
        if(Auth::attempt($credentials)){
            return 'login exitoso';
        }
        return 'login fracaso';

    }
    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
    public function username()
{
    return 'ID';
}
}
