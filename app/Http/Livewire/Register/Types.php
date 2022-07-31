<?php

namespace App\Http\Livewire\Register;

use App\Models\types as ModelsTypes;
use Livewire\Component;
use Livewire\WithPagination;

class Types extends Component
{
    
    use WithPagination;
    public $search='';

    public function updatingSearch(){
        $this->resetPage();
    }
    public $deleteModal=false;
    public $showModel=false;

    public ModelsTypes $editing;

    public function rules(){
        return [
           'editing.name' => 'required|min:2|max:25',
        ];
    }

    public function mount(){
        $this->editing = $this->makeBlankType();
    }

    public function makeBlankType(){
        return ModelsTypes::make();
    }


    public function create(){
        if($this->editing->getKey())
        $this->editing = $this->makeBlankType();
        $this->showModel=true;
    }

    public function save(){
        $this->validate();
        $this->editing->save();
        $this->showModel=false;
    }

    public function edit(ModelsTypes $type){
       if($this->editing->isNot($type))
       $this->editing = $type;
       $this->showModel= true;
    }

    public function confirmDelete($id){
       $this->deleteModal =$id;
    }

    public function delete(ModelsTypes $type){
        $type->delete();
        $this->deleteModal= false;
    }


    public function render()
    {
        $array = [
            
            'types' => ModelsTypes::where('name', 'like','%'.$this->search.'%')
                        ->paginate(10),
          ];
        return view('livewire.register.types',$array);
    }
}
