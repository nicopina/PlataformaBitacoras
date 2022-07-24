<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class adminBitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $bitacoras = Bitacora::select('users.*','bitacoras.*')->
                                leftjoin('users','id','=','ID_Usuario')->
                                where('Fecha','=','2022-01-28')->
                                get();
        return $bitacoras;
        $users = User::all();
        return $users;
        $result = $users->intersect($bitacoras);
        return $result; */
        return view('admin.admin.bitacoras');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = Crypt::decrypt($id);
        return view('admin.admin.bitacorasUsuarios',compact('fecha'));
    }
    public function show2($idU,$idB)
    {
        $usuario = User::find(Crypt::decrypt($idU));
        // return $user;
        $bitacora = Crypt::decrypt($idB);
        // return $entradas;
        $fecha = Bitacora::where('ID_Bitacora','=',Crypt::decrypt($idB))->get()[0];
        // return $fecha;
        return view('admin.admin.bitacorasUsuariosVer',compact('bitacora','fecha','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
