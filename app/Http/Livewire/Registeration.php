<?php

namespace App\Http\Livewire;

use App\Models\color;
use App\Models\devices;
use Livewire\Component;
use Livewire\WithPagination;

class Registeration extends Component
{

    use WithPagination;
 
    public $search = '';
 
    public function updatingSearch()  
    {
        $this->resetPage();
    }

    public $sortField ;
    public $sortDirection = 'asc';

    // public function sortBy($field){
    //   $this->sortField = $field;
    // }



    public function render()
    {
          $array = [
            'devices' => devices::where('name', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField,$this->sortDirection)
                          ->paginate(10),
            'colors' => color::paginate(10),
          ];

        return view('livewire.registeration' ,$array);
    }
}
