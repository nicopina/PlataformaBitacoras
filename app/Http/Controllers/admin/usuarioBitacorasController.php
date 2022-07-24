<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Http\Request;

class usuarioBitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usuario.bitacoras');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Bitacora::where('ID_Usuario','=',auth()->user()->id)->get();
        // return auth()->user()->id;
        // return Carbon::now()->format('Y-m-d');
        // return sizeof(Bitacora::where('ID_Usuario','=',auth()->user()->id)->where('Fecha','=',Carbon::now()->format('Y-m-d'))->get());
        if (sizeof(Bitacora::where('ID_Usuario','=',auth()->user()->id)->where('Fecha','=',Carbon::now()->format('Y-m-d'))->get())==0){
            Bitacora::create(['ID_Usuario'=>auth()->user()->id,'Fecha'=>Carbon::now()->format('Y-m-d')]);
        }
        $frecuencia = array('1'=>'Nunca','2'=>'Poco Frecuente','3'=>'Frecuente','4'=>'Siempre');
        json_encode($frecuencia);
        return view('admin.usuario.hoy',compact('frecuencia'));
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
        //
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
