<?php

namespace App\Http\Livewire\Admin;

use App\Models\Entrada;
use Livewire\Component;
use Livewire\WithPagination;

class BitacorasUsuariosVer extends Component
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
        $entradas = Entrada::where('ID_Bitacora','=',$this->bitacora)->orderby('Hora')->paginate(9);
        return view('livewire.admin.bitacoras-usuarios-ver',compact('entradas'));
    }
}
