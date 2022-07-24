<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
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
        $users = User::select('users.*','areas.Nombre as Area')->
                        leftjoin('areas','users.ID_Area','=','areas.ID_Area')->
                        where('ID',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('user',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('users.Nombre',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('Segundo_nombre',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('Apellido',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('Segundo_apellido',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('areas.Nombre',"LIKE" ,'%'.$this->search.'%')->
                        orderby('Bloqueado')->
                        orderby('users.Nombre')->
                        paginate(5);
        foreach($users as $user){
            if($user->Bloqueado == 0) $user->Bloqueado = 'NO';
            if($user->Bloqueado == 1) $user->Bloqueado = 'SI';
        }
        


        return view('livewire.admin.usuarios',compact('users'));
    }
}
