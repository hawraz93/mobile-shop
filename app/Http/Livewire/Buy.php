<?php

namespace App\Http\Livewire;

use App\Models\boxs;
use App\Models\buyOrder;
use App\Models\color;
use App\Models\devices;
use App\Models\Products;
use App\Models\types;
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
            'products' =>Products::when($this->orderId , function ($query){
              $query->where('buyOrder_id' ,$this->orderId);
            })->paginate(10),
            'devices' =>devices::get(),
            'types' =>types::get(),
            'colors' =>color::get(),
            'boxs' =>boxs::get(),
          ];
        return view('livewire.buy',$array);
    }


    public Products $product;
    public buyOrder $order;
    public $deleteModal=false;
    public $showModel=false;
    public $showModelProduct=false;

    public $showProductCreate=false;
    public $orderId;
    public $orderProduct=[];

    public function rules(){
        return[
            'order.order' =>'required|max:255',
            'order.price' =>'required|numeric',
            'order.priceType' =>'nullable|string|max:100',
            'order.rate' =>'nullable|numeric',
            'order.productsNum' =>'nullable|string',
            'order.company' =>'nullable|string|min:3|max:255',
            'order.country' =>'nullable|string|min:3|max:255',
            'order.shipping' =>'nullable|string',
            'order.note' =>'nullable|string|min:5',
     
            'product.name' =>'required|string|max:100',
            'product.size' =>'nullable|string|max:100',
            'product.quality' =>'nullable|string|max:100',
            'product.quantity' =>'required|numeric|max:1000',
            'product.sellPrice' =>'required|numeric|max:1000000',
            'product.buyPrice' =>'required|numeric|max:1000000',
            'product.device_id' =>'required|numeric',
            'product.color_id' =>'nullable|numeric',
            'product.buyOrder_id' =>'required|numeric',
            'product.type_id' =>'nullable|numeric',
            'product.box_id' =>'nullable|numeric',
            'product.note' =>'nullable|string|min:5',
        ];
    }

    public function mount(){
        $this->order = $this->makeBlankOrder();
        $this->product = $this->makeBlankProduct();
        
    }
 

    public function makeBlankProduct(){
        return Products::make([
            'buyOrder_id' => $this->orderId,
        ]);
    }

    public function createProduct(){
        if($this->product->getKey())
        $this->product = $this->makeBlankProduct();
       $this->showModelProduct=true;
    }

    public function saveProduct(){
        $this->validateOnly('product.*');
        $this->product->save();
        $this->mount();
    }

    public function editProduct( Products $productId){
        $this->product = $productId;

    }
    public function confirmDeleteProduct($id){
        $this->deleteModal =$id;
     }
 
   

    public function deleteProduct(Products $product){
        $product->delete();
        $this->deleteModal= false;

    }


    public function addToProduct($orderId){
        $this->orderId = $orderId;
        $this->mount();
        $this->showProductCreate=true;
    }


    public function makeBlankOrder(){
        return buyOrder::make(
            [
              'priceType' =>'$',
              'order' =>NOW()->format('dmY'),
            ]
        );
    }  

    public function createOrder(){
        if($this->order->getKey())
        $this->order = $this->makeBlankOrder();
        $this->showModel=true;
    }

    public function saveOrder(){
        $this->validateOnly('order.*');
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
