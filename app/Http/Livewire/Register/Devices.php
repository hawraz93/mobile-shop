<?php

namespace App\Http\Livewire\Register;

use App\Models\devices as ModelsDevices;
use Livewire\Component;
use Livewire\WithPagination;

class Devices extends Component
{
    use WithPagination;
 
    public $search = '';
 
    public function updatingSearch()  
    {
        $this->resetPage();
    }

    public $showDeviceEditModel=false;
    public $deviceDeleteModal=false;
    public ModelsDevices $editing;




    protected $rules=[
        'editing.name' =>'required|min:2|max:100',
        'editing.model' =>'required|min:2|max:100',
        'editing.company' =>'required|min:2|max:100',
    ];
    
    public function mount(){
      $this->editing = $this->makeBlandDevices();
    }

    
    public function edit(ModelsDevices $devicesId){
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
      return ModelsDevices::make();
    }

    public function create(){
      if ($this->editing->getKey()) 
         $this->editing = $this->makeBlandDevices();
         $this->showDeviceEditModel= true;
      
   
    }

    public function confirmDeleteDevice( $id){
      $this->deviceDeleteModal=$id;
    }

    public function deleteDevice(ModelsDevices $device){
      
      $device->delete();
      $this->deviceDeleteModal=false;
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
            'devices' => ModelsDevices::where('name', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField, $this->sortDirection)
                          ->paginate(10),
          ];
        return view('livewire.register.devices',$array);
    }
}
