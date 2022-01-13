<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\Entrada;

class UsuarioController extends Controller
{
    public function Inicio()
    {
        return view('Usuario.Inicio');
    }
    public function Bitacoras()
    {
        $bitacoras = Bitacora::where('ID_Usuario','=',"123")->orderbyDesc('Fecha')->get();
        return view('Usuario.BitacorasPersonales' ,compact('bitacoras'));
    }
    public function Ver_bitacora($id)
    {
        $entradas = Entrada::where('ID_Bitacora','=',$id)->orderby('Hora')->get();
        return view('Usuario.VerBitacora' ,compact('entradas'));
    }
    public function Hoy()
    {   
        $bitacora = Bitacora::where('Fecha','=',now()->toDateString())->where('ID_Usuario','=',"123")->get(); 
        if(sizeof($bitacora)!=0){
            $entradas = Entrada::where('ID_Bitacora','=',$bitacora[0]->ID_Bitacora)->orderby('Hora')->get();
        }else{
            $bitacora = new Bitacora();
            $bitacora->Fecha = now()->toDateString();
            $bitacora->ID_Usuario = '123';
            $bitacora->save();
            $entradas = [];
        }
        
        return view('Usuario.BitacoraHoy',compact('entradas','bitacora'));
    }
    public function Ingresar_entrada(Request $request){
        $bitacora = Bitacora::where('Fecha','=',now()->toDateString())->where('ID_Usuario','=',"123")->get();
        $entrada = new Entrada();
        $entrada->ID_Bitacora = $bitacora[0]->ID_Bitacora;
        $entrada->Hora = $request->hora;
        $entrada->Frecuencia = $request->frecuencia;
        $entrada->Nombre_actividad = $request->nombre;
        $entrada->Descripcion_actividad = $request->descripcion;
        $entrada->save();
        return redirect('/Usuario.hoy');
    }
    public function Seleccionar_entrada($id){
        $editar = Entrada::find($id);
        $bitacora = Bitacora::where('Fecha','=',now()->toDateString())->where('ID_Usuario','=',"123")->get(); 
        if(sizeof($bitacora)!=0){
            $entradas = Entrada::where('ID_Bitacora','=',$bitacora[0]->ID_Bitacora)->get();
        }else{
            $entradas = [];
        }
        return view('Usuario.BitacoraHoy',compact(['editar','entradas']));
    }
    public function Editar_entrada(Request $request, $id){    
        $entrada = [
        "Nombre_actividad"=>$request->nombre,
        "Hora"=>$request->hora,
        "Descripcion_actividad"=>$request->descripcion,
        "Frecuencia"=>$request->frecuencia,
        "ID_Entrada"=>$id,
        "ID_Bitacora"=>Entrada::find($id)->ID_Bitacora       
        ];
        json_encode($entrada);
        Entrada::where('ID_Entrada','=',$id)->update($entrada);
        return redirect('/Usuario.hoy');
    }
    public function Eliminar_entrada($id){
       Entrada::destroy($id);
       return redirect('/Usuario.hoy');
   }
}
