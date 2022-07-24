<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Bitacora;
use App\Models\Entrada;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class HoyEntradas extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $entradas = Entrada::where('ID_Bitacora','=',Bitacora::where('ID_Usuario','=',auth()->user()->id)->where('Fecha','=',Carbon::now()->format('Y-m-d'))->get()[0]->ID_Bitacora)->orderby('Hora')->paginate(5);

        return view('livewire.usuario.hoy-entradas',compact('entradas'));
    }
}
