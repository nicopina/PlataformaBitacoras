<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function inicio(){
        return redirect('/Inicio');
    }
    public function index(){
        return view('admin.index');
    }

}
