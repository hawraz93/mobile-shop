<?php

namespace App\Http\Livewire;

use App\Models\buy as ModelsBuy;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;

class Buy extends Component
{

    use WithPagination;
 
    public $search = '';

    public function updatingSearch()  
    {
        $this->resetPage();
    }



    protected $queryString =['sortField' , 'sortDirection'];

    public $sortField ='id';
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
            'buys' => ModelsBuy::with('product')->latest()->where('delegate', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField, $this->sortDirection)
                          ->latest()
                          ->paginate(10),
            'products' =>Products::get(),
          ];
        return view('livewire.buy',$array);
    }


    public ModelsBuy $item;
    public $deleteModal=false;
    public $orderProduct=[];

    public function rules(){
        return[
            'item.product_id' =>'required|numeric',
            'item.quantity' =>'required|numeric',
            'item.delegate' =>'nullable|string|max:100',
            'item.delegate_phone' =>'nullable|numeric',
            'item.note' =>'nullable|string|min:5',
       
        ];
    }

    public function mount(){
        $this->item = $this->makeBlank();
        
    }
    public function makeBlank(){
        return ModelsBuy::make();
    }

    public function create(){
       $this->item = $this->makeBlank();
    }

    public function save(){
        $this->validate();
        $this->item->save();

        $this->mount();
    }

    public function edit( ModelsBuy $item){
        $this->item = $item;

    }
    public function confirmDelete($id){
        $this->deleteModal =$id;
     }
 
   

    public function delete(ModelsBuy $item){
        $item->delete();
        $this->deleteModal= false;

    }

}
