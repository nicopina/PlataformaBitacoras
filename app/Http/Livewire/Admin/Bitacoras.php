<?php

namespace App\Http\Livewire\Admin;

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
        $bitacoras = Bitacora::select('Fecha')->where('Fecha',"LIKE" ,'%'.$this->search.'%')->orderby('Fecha','DESC')->distinct('Fecha')->paginate(5);
        return view('livewire.admin.bitacoras',compact('bitacoras'));
    }
}
