<?php

namespace App\Http\Livewire\Register;

use App\Models\color as ModelsColor;
use Livewire\Component;
use Livewire\WithPagination;

class Color extends Component
{
    use WithPagination;
    public $search='';

    public function updatingSearch(){
        $this->resetPage();
    }
    public $deleteModal=false;
    public $showColorModel=false;

    public ModelsColor $editing;

    public function rules(){
        return [
           'editing.color' => 'required|min:2|max:25',
        ];
    }

    public function mount(){
        $this->editing = $this->makeBlankColor();
    }

    public function makeBlankColor(){
        return modelsColor::make();
    }


    public function create(){
        if($this->editing->getKey())
        $this->editing = $this->makeBlankColor();
        $this->showColorModel=true;
    }

    public function save(){
        $this->validate();
        $this->editing->save();
        $this->showColorModel=false;
    }

    public function edit(ModelsColor $color){
       if($this->editing->isNot($color))
       $this->editing = $color;
       $this->showColorModel= true;
    }

    public function confirmDelete($id){
       $this->deleteModal =$id;
    }

    public function delete(ModelsColor $color){
        $color->delete();
        $this->deleteModal= false;
    }



    public function render()
    {
        $array = [
            
            'colors' => ModelsColor::where('color', 'like','%'.$this->search.'%')
                        ->paginate(10),
          ];
        return view('livewire.register.color',$array);
    }
}
