<?php

namespace App\Http\Livewire\Admin;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class Areas extends Component
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
        $areas = Area::where('ID_Area',"LIKE" ,'%'.$this->search.'%')->
                        orwhere('Nombre',"LIKE" ,'%'.$this->search.'%')->
                        orderby('Nombre')->
                        paginate(5);
        return view('livewire.admin.areas',compact('areas'));
    }
}
