<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Boxs;
use App\Models\accessories;
use App\Models\boxs as ModelsBoxs;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{    
    use WithPagination;
 
    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public accessories $editing;

    public $showCreateAccessoriesModal=false;
    public $accessoriesDeleteModal=false;
     
    public $accessorie=false,$accessories ,$boxId;

    public function mount(){
          $this->editing = $this->makeBlankAccessories();
    }

    public function makeBlankAccessories(){
        return accessories::make(['box_id' =>$this->boxId]);
    }
   
    public function showAccessories($boxId){
       $this->accessorie=true;
         $this->boxId=$boxId;
         $this->accessories=accessories::where('box_id' ,$boxId)->get();
    }
 
    public function createBoxs(){
        $this->accessorie=false;
        ModelsBoxs::create();
    }
    
   public function create(){
    $this->editing = $this->makeBlankAccessories();
    $this->showCreateAccessoriesModal=true;

   }
   public function confirmDeleteAccessories($id){
       $this->accessoriesDeleteModal=$id;
   }
   public function deleteAccessories(accessories $accessorieId){
    $accessorieId->delete();

    $this->showaccessories($this->boxId);
    $this->accessoriesDeleteModal=false;

   }

    public function editAccessories(accessories $accessorie){
        if($this->editing->isNot($accessorie))
        $this->editing = $accessorie;
        $this->showCreateAccessoriesModal=true;

    }


    public function rules()
    {
        return[
            'editing.name' =>'required|string|max:100',
            'editing.size' =>'string|max:100',
            'editing.quality' =>'string|max:100',
            'editing.quantity' =>'required|numeric|max:1000',
            'editing.sellPrice' =>'required|numeric|max:1000000',
            'editing.buyPrice' =>'required|numeric|max:1000000',
            'editing.device_id' =>'required|numeric',
            'editing.color_id' =>'nullable|numeric',
            'editing.box_id' =>'required|numeric',
            'editing.note' =>'nullable|string|min:5',
        ];
    }


    public function saveAccessories(){

        $this->validate();

        $this->editing->save();

        $this->showCreateAccessoriesModal=false;
        $this->showAccessories($this->boxId);
    }  
    public function render()
    {
        $array=[
            'boxs' =>ModelsBoxs::where('id', 'like', '%'.$this->search.'%')->paginate(30),  
      ];
       
        return view('livewire.post', $array);
    }

}
