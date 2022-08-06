<?php

namespace App\Http\Livewire;

use App\Models\buyOrder;
use App\Models\Order;
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
            'orders' => BuyOrder::latest()->where('order', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField, $this->sortDirection)
                          ->latest()
                          ->paginate(10),
            'products' =>Products::paginate(10),
          ];
        return view('livewire.buy',$array);
    }


    public Products $product;
    public buyOrder $order;
    public $deleteModal=false;
    public $showModel=false;

    public $productCreate=false;
    public $orderProduct=[];

    public function rules(){
        return[
            'order.order' =>'required|max:255',
            'order.price' =>'required|numeric',
            'order.priceType' =>'nullable|string|max:100',
            'order.rate' =>'nullable|numeric',
            'order.productsNum' =>'nullable|string|min:5',
            'order.company' =>'nullable|string|min:3|max:255',
            'order.country' =>'nullable|string|min:3|max:255',
            'order.shipping' =>'nullable|string',
            'order.note' =>'nullable|string|min:5',
       
        ];
    }

    public function mount(){
        $this->order = $this->makeBlankOrder();
        
    }
    public function makeBlankOrder(){
        return buyOrder::make(
            [
              'priceType' =>'$',
              'order' =>NOW()->format('dmY'),
            ]
        );
    }   
    // public function makeBlank(){
    //     return Products::make();
    // }

    // public function create(){
    //    $this->item = $this->makeBlank();
    // }

    // public function save(){
    //     $this->validate();
    //     $this->item->save();

    //     $this->mount();
    // }

    // public function edit( ModelsBuy $item){
    //     $this->item = $item;

    // }
    // public function confirmDelete($id){
    //     $this->deleteModal =$id;
    //  }
 
   

    // public function delete(ModelsBuy $item){
    //     $item->delete();
    //     $this->deleteModal= false;

    // }


    public function addToProduct(){
        $this->productCreate=true;
    }

    public function createOrder(){
        if($this->order->getKey())
        $this->order = $this->makeBlankOrder();
        $this->showModel=true;
    }

    public function saveOrder(){
        $this->validate();
        $this->order->save();
        $this->showModel=false;
    }

    public function editOrder(buyOrder $orderId){
       if($this->order->isNot($orderId))
       $this->order = $orderId;
       $this->showModel= true;
    }

    public function confirmDeleteOrder($id){
       $this->deleteModal =$id;
    }

    public function deleteOrder(buyOrder $orderId){
        $orderId->delete();
        $this->deleteModal= false;
    }

}
