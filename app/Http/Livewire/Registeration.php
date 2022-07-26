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

    public $showDeviceEditModel=false;
    public devices $editing;




    protected $rules=[
        'editing.name' =>'required|min:2|max:100',
        'editing.model' =>'required|min:2|max:100',
        'editing.company' =>'required|min:2|max:100',
    ];
    
    public function mount(){
      $this->editing = $this->makeBlandDevices();
    }
    public function edit(devices $devicesId){
      if($this->editing->isNot($devicesId))
      $this->editing = $devicesId;
      $this->showDeviceEditModel =true;
    }

    public function save(){
      $this->validate();
      $this->editing->save();
      $this->showDeviceEditModel=false;
    }
    public function makeBlandDevices(){
      return devices::make();
    }

    public function create(){
      if ($this->editing->getKey()) 
         $this->editing = $this->makeBlandDevices();
         $this->showDeviceEditModel= true;
      
   
    }




    protected $queryString =['sortField' , 'sortDirection'];

    public $sortField ='created_at' ;
    public $sortDirection = 'asc';

    public function sortBy($field){
  
      $this->sortDirection= $this->sortField ===$field 
            ?  $this->sortDirection =  $this->sortDirection === 'asc' ? 'desc' :'asc'
            : 'asc';
     
            $this->sortField = $field;
    }



    public function render()
    {
          $array = [
            'devices' => devices::where('name', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField, $this->sortDirection)
                          ->paginate(10),
            'colors' => color::paginate(10),
          ];

        return view('livewire.registeration' ,$array);
    }
}
