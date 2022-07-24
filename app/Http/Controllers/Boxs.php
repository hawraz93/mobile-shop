<?php

namespace App\Http\Controllers;

use App\Models\boxs as ModelsBoxs;
use App\Models\tools;
use Livewire\Component;
use Livewire\WithPagination;

class Boxs extends Component
{


    use WithPagination;
 
    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $showCreateToolsModal=false;
     
    public $tool=false,$tools ,$boxId;

    public function addTodo()
    {
        dd('hi');
    }
    public function showTools(){
       dd('his');
        //  $this->boxId=$boxId;
        //  $this->tools=tools::where('box_id' ,$boxId)->get();
    }
 
    public function createBoxs(){
       
        ModelsBoxs::create();
    }
    
    public function render()
    {
        $array=[
            'boxs' =>ModelsBoxs::where('id', 'like', '%'.$this->search.'%')->paginate(30),  
      ];
        return view('boxs',$array);
    }

    public function createTools(){
        $this->showCreateToolsModal=true;
    }


    public $item;
    protected $rules=[
        'item.name' =>'required|string|max:100',
        'item.type' =>'string|max:100',
        'item.quantity' =>'required|numeric|max:100',
        'item.sellPrice' =>'required|numeric|max:100',
        'item.buyPrice' =>'required|numeric|max:100',
        'item.box_id' =>'required|numeric|max:50',
        'item.note' =>'nullable|string|max:5',
    ];


    public function saveItem(){
        $this->validate();


    }
}
