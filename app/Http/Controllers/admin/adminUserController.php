<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\actualizarUsuarioRequest;
use App\Http\Requests\crearUsuarioRequest;
use App\Models\Area;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class adminUserController extends Controller
{
    public function bitacora($id)
    {
        $user = User::find(Crypt::decrypt($id));
        // return $user;
        return view('admin.admin.usuariosBitacoras',compact('user'));
    }
    public function bitacora_ver($id)
    {
        $bitacora = Bitacora::where('ID_Bitacora','=',Crypt::decrypt($id))->get()[0];
        // return $bitacora;
        return view('admin.admin.usuariosBitacorasVer',compact('bitacora'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.usuarios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $a = User::all();
        // return $a[0]->hasRole('Usuario');
        $areas = Area::all()->sortBy('Nombre')->pluck('Nombre','ID_Area');
        $roles = Role::all()->sortByDesc('id')->pluck('name','id');
        return view('admin.admin.usuariosCrear',compact('areas','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(crearUsuarioRequest $request)
    {
        $rol = $request->rol;
        $request->merge(['password'=>bcrypt($request->password)]);       
        if($rol == 1){
            User::create($request->except('rol'))->assignRole('Admin');
        }
        if($rol == 2){
            User::create($request->except('rol'))->assignRole('Supervisor');
        }
        if($rol == 3){
            User::create($request->except('rol'))->assignRole('Usuario');
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        // return $id;
        // return User::find(1)->getRoleNames();
        $areas = Area::all()->sortBy('Nombre')->pluck('Nombre','ID_Area');
        $rol = User::find($id)->getRoleNames();
        if (sizeof($rol) == 0){
            $rol = ['Sin rol'];
        };
        $user = User::find($id);
        $block = array('1'=>'SI','0'=>'NO');
        json_encode($block);
        // return $block;
        // return $areas;
        // return $user;
        return view('admin.admin.usuariosEditar', compact('user','rol','areas','block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(actualizarUsuarioRequest $request, $id)
    {
        // return $request;
        if($request->password == null){
            $request->merge(['password'=>User::find($id)->password]);
        }
        else{
            $request->merge(['password'=>bcrypt($request->password)]);
        }
        User::find($id)->update($request->except('id'));
        return redirect()->route('admin.users.index');
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
