<?php

namespace App\Http\Livewire\Admin;

use App\Models\Area;
use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class BitacorasUsuarios extends Component
{
    public $search;
    public $fecha;
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function mount($fecha)
    {
        $this->fecha = $fecha;
    }

    public function render()
    {
        $users = Bitacora::select('users.*','bitacoras.*','areas.Nombre as Area')->
                                leftjoin('users','id','=','ID_Usuario')->
                                leftjoin('areas','users.ID_Area','=','areas.ID_Area')->
                                where([['Fecha','=',$this->fecha],['ID',"LIKE" ,'%'.$this->search.'%']])->
                                orwhere([['Fecha','=',$this->fecha],['user',"LIKE" ,'%'.$this->search.'%']])->
                                orwhere([['Fecha','=',$this->fecha],['users.Nombre',"LIKE" ,'%'.$this->search.'%']])->
                                orwhere([['Fecha','=',$this->fecha],['Segundo_nombre',"LIKE" ,'%'.$this->search.'%']])->
                                orwhere([['Fecha','=',$this->fecha],['Apellido',"LIKE" ,'%'.$this->search.'%']])->
                                orwhere([['Fecha','=',$this->fecha],['Segundo_apellido',"LIKE" ,'%'.$this->search.'%']])->
                                orwhere([['Fecha','=',$this->fecha],['areas.Nombre',"LIKE" ,'%'.$this->search.'%']])->       
                                orderby('Bloqueado')->
                                orderby('users.Nombre')->               
                                paginate(9);                      
        foreach($users as $user){
            $user->ID_Area = Area::where('ID_Area','=',$user->ID_Area)->get()[0]->Nombre;
            if($user->Bloqueado == 0) $user->Bloqueado = 'NO';
            if($user->Bloqueado == 1) $user->Bloqueado = 'SI';
        }
        return view('livewire.admin.bitacoras-usuarios',compact('users'));
    }
}
