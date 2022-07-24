<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class UserBitacora extends Component
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
        return view('livewire.admin.user-bitacora',compact('bitacoras'));
    }
}
