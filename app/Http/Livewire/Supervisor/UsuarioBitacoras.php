<?php

namespace App\Http\Livewire\Supervisor;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioBitacoras extends Component
{
    public $search;
    public $user;
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $bitacoras = Bitacora::where([['ID_Usuario','=',$this->user->id],['Fecha',"LIKE" ,'%'.$this->search.'%']])->
                                orderby('Fecha','DESC')->
                                paginate(5);
        return view('livewire.supervisor.usuario-bitacoras',compact('bitacoras'));
    }
}
