<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;

class Bitacoras extends Component
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
        $bitacoras = Bitacora::where('ID_Usuario','=',auth()->user()->id)->
                    where('Fecha',"LIKE" ,'%'.$this->search.'%')->
                    orderby('Fecha','DESC')->
                    paginate(5);

        return view('livewire.usuario.bitacoras',compact('bitacoras'));
    }
}
