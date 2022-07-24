<?php

namespace App\Http\Livewire\Supervisor;

use App\Models\Area;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::select('users.*','model_has_roles.*','areas.Nombre as Area')->
                        leftjoin('model_has_roles','id','=','model_id')->
                        leftjoin('areas','users.ID_Area','=','areas.ID_Area')->
                        orwhere([['role_id','=','3'],['user',"LIKE" ,'%'.$this->search.'%']])->
                        orwhere([['role_id','=','3'],['users.Nombre',"LIKE" ,'%'.$this->search.'%']])->
                        orwhere([['role_id','=','3'],['Segundo_nombre',"LIKE" ,'%'.$this->search.'%']])->
                        orwhere([['role_id','=','3'],['Apellido',"LIKE" ,'%'.$this->search.'%']])->
                        orwhere([['role_id','=','3'],['Segundo_apellido',"LIKE" ,'%'.$this->search.'%']])->
                        orwhere([['role_id','=','3'],['areas.Nombre',"LIKE" ,'%'.$this->search.'%']])->
                        orderby('Bloqueado')->
                        orderby('users.Nombre')->
                        paginate(5);
        
        foreach($users as $user){
            $user->ID_Area = Area::where('ID_Area','=',$user->ID_Area)->get()[0]->Nombre;
            if($user->Bloqueado == 0) $user->Bloqueado = 'NO';
            if($user->Bloqueado == 1) $user->Bloqueado = 'SI';
        }
        


        return view('livewire.supervisor.usuarios',compact('users'));
    }
}
