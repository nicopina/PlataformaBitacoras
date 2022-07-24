<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entrada;
use Livewire\Component;
use Livewire\WithPagination;

class UserBitacoraVer extends Component
{
    public $bitacora;
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function mount($bitacora)
    {
        $this->bitacora = $bitacora;
    }

    public function render()
    {
        $entradas = Entrada::where('ID_Bitacora','=',$this->bitacora->ID_Bitacora)->orderby('Hora')->paginate(8);
        return view('livewire.admin.user-bitacora-ver',compact('entradas'));
    }
}
