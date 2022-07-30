<?php

namespace App\Http\Livewire;

use App\Models\accessories;
use App\Models\boxs;
use App\Models\color;
use App\Models\devices;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
 
    public $search = '';
 
    public function updatingSearch()  
    {
        $this->resetPage();
    }

    public accessories $accessory;
    public $deleteModal=false;
    public $showModel=false;

    public function rules(){
        return[
            'accessory.name' =>'required|string|max:100',
            'accessory.size' =>'nullable|string|max:100',
            'accessory.quality' =>'nullable|string|max:100',
            'accessory.quantity' =>'required|numeric|max:1000',
            'accessory.sellPrice' =>'required|numeric|max:1000000',
            'accessory.buyPrice' =>'required|numeric|max:1000000',
            'accessory.device_id' =>'required|numeric',
            'accessory.color_id' =>'nullable|numeric',
            'accessory.box_id' =>'nullable|numeric',
            'accessory.note' =>'nullable|string|min:5',
        ];
    }
    public function mount(){
        $this->accessory = $this->makeBlankColor();
    }

    public function makeBlankColor(){
        return accessories::make();
    }


    public function create(){
        // if($this->accessory->getKey())
        $this->accessory = $this->makeBlankColor();
        $this->showModel=true;
    }

    public function save(){
        $this->validate();
        $this->accessory->save();
        $this->showModel=false;
    }

    public function edit(accessories $accessories){
       if($this->accessory->isNot($accessories))
       $this->accessory = $accessories;
       $this->showModel= true;
    }

    public function confirmDelete($id){
       $this->deleteModal =$id;
    }

    public function delete(accessories $accessories){
        $accessories->delete();
        $this->deleteModal= false;
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
            'accessories' => accessories::with('device')->where('name', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField, $this->sortDirection)
                          ->paginate(10),
                          
            'devices' =>devices::get(),
            'colors' =>color::get(),
            'boxs' =>boxs::get(),
          ];
        return view('livewire.table',$array);
    }
}
