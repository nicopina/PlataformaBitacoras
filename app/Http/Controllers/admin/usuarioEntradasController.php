<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\crearEntradaRequest;
use App\Models\Bitacora;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class usuarioEntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hola';
    }

    public function ver($bitacora)
    {
        $bitacora = Crypt::decrypt($bitacora);
        $bitacora = Bitacora::find($bitacora);
        $entradas = Entrada::where('ID_Bitacora','=',$bitacora->ID_Bitacora)->orderby('Hora')->paginate(9);
        // return $entradas;
        return view('admin.usuario.bitacorasVer',compact('bitacora','entradas'));
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
    public function store(crearEntradaRequest $request)
    {
        // return $request->Hora;
        $bitacora = Bitacora::where('ID_Usuario','=',auth()->user()->id)->
                                where('Fecha','=',Carbon::now()->format('Y-m-d'))->get()[0]->ID_Bitacora;
        // return $bitacora;
        if($request->Frecuencia == 1){
            $request->merge(['Frecuencia'=>'Nunca']);
        }
        if($request->Frecuencia == 2){
            $request->merge(['Frecuencia'=>'Poco Frecuente']);
        }
        if($request->Frecuencia == 3){
            $request->merge(['Frecuencia'=>'Frecuente']);
        }
        if($request->Frecuencia == 4){
            $request->merge(['Frecuencia'=>'Siempre']);
        }
        // return $request;
        $request = array_merge($request->all(),['ID_Bitacora' => strval($bitacora)]);

        Entrada::create($request);
        return redirect()->route('usuario.bitacoras.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $id = Crypt::decrypt($id);
        // return $id;
        $entrada = Entrada::find($id);
        if($entrada->Frecuencia == 'Nunca'){
            $entrada->Frecuencia ='1';
        }
        if($entrada->Frecuencia == 'Poco Frecuente'){
            $entrada->Frecuencia ='2';
        }
        if($entrada->Frecuencia == 'Frecuente'){
            $entrada->Frecuencia ='3';
        }
        if($entrada->Frecuencia == 'Siempre'){
            $entrada->Frecuencia ='4';
        }
        // return $entrada;
        $frecuencia = array('1'=>'Nunca','2'=>'Poco Frecuente','3'=>'Frecuente','4'=>'Siempre');
        json_encode($frecuencia);
        return view('admin.usuario.hoyEditar',compact('entrada','frecuencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'hola';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(crearEntradaRequest $request, $id)
    {
        if($request->Frecuencia == '1'){
            $request->merge(['Frecuencia'=>'Nunca']);
        }
        if($request->Frecuencia == '2'){
            $request->merge(['Frecuencia'=>'Poco Frecuente']);
        }
        if($request->Frecuencia == '3'){
            $request->merge(['Frecuencia'=>'Frecuente']);
        }
        if($request->Frecuencia == '4'){
            $request->merge(['Frecuencia'=>'Siempre']);
        }
        // return $request;
        Entrada::find($id)->update($request->except('ID_Entrada'));
        return redirect()->route('usuario.bitacoras.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entrada::destroy($id);
        return redirect()->route('usuario.bitacoras.create');
    }
}
