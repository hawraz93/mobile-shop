<?php

namespace App\Http\Livewire;

use App\Models\boxs;
use App\Models\cart;
use App\Models\color;
use App\Models\devices;
use App\Models\Order;
use App\Models\Products;
use App\Models\types;
use Illuminate\Support\Facades\DB;
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

    public Products $product;
    public $deleteModal=false;
    public $showModel=false;
    public $orderProduct=[];

    public function rules(){
        return[
            'product.name' =>'required|string|max:100',
            'product.size' =>'nullable|string|max:100',
            'product.quality' =>'nullable|string|max:100',
            'product.quantity' =>'required|numeric|max:1000',
            'product.sellPrice' =>'required|numeric|max:1000000',
            'product.buyPrice' =>'required|numeric|max:1000000',
            'product.device_id' =>'required|numeric',
            'product.color_id' =>'nullable|numeric',
            'product.type_id' =>'nullable|numeric',
            'product.box_id' =>'nullable|numeric',
            'product.note' =>'nullable|string|min:5',
        ];
    }
   
    public $total=0 ,$qty,$sp;
   
    public function mount(){
        $this->product = $this->makeBlankColor();
        
    }


    public function makeBlankColor(){
        return Products::make();
    }


    public function create(){
       
        if($this->product->getKey())
        $this->product = $this->makeBlankColor();
        $this->showModel=true;
    }

    public function save(){
        $this->validate();
        $this->product->save();
        $this->showModel=false;
    }

    public function edit(Products $productId){
       if($this->product->isNot($productId))
       $this->product = $productId;
       $this->showModel= true;
    }

    public function confirmDelete($id){
       $this->deleteModal =$id;
    }

    public function delete(Products $productId){
        $productId->delete();
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
            'products' => Products::with('device')->where('name', 'like','%'.$this->search.'%')
                          ->orderBy($this->sortField, $this->sortDirection)
                          ->paginate(10),
            'devices' =>devices::get(),
            'types' =>types::get(),
            'colors' =>color::get(),
            'boxs' =>boxs::get(),
          ];

          $cartItem =cart::with('product')->get()
          ->map(function (cart $item){
            return (object)[
                    'id' => $item->product_id,
                    'name' => $item->product->name,
                    'price' => $item->product->sellPrice,
                    'quantity' => $item->quantity,
                    'total' => ($item->quantity * $item->product->sellPrice),
            ];
          });


          $this->total= $cartItem->sum('total');
          

        return view('livewire.table',$array ,compact('cartItem'));
    }

    public function addToCard($productId){


        $cart = cart::where('product_id' ,$productId)->first();

        if (!$cart) {
            cart::create(['product_id' => $productId, 'quantity' => 1]);
        }else{
            $cart->update(['quantity' =>$cart->quantity +1]);
        }

        $this->emit('updateCard');

    }

    public function increaseQuantity($id ,$quantity){
        cart::where('product_id' ,$id)->update(['quantity' =>$quantity+1]);
    }
    public function decreaseQuantity($id, $quantity){
        if ($quantity !=1) {
            cart::where('product_id' ,$id)->update(['quantity' =>$quantity-1]);
        } else {
            cart::where('product_id' , $id)->delete();
        }
        
    }

    public function checkout(){
       $cart = cart::with('product')->where('user_id' , auth()->id())->get();

       $product = Products::select('id','quantity')
                  ->whereIn('id',$cart->pluck('product_id'))
                  ->pluck('quantity' ,'id');
                  foreach ($cart  as $cartProduct) {
                    if (!isset($product[$cartProduct->product_id]) || $product[$cartProduct->product_id ] < $cartProduct->quantity) {
                       $this->checkout_message= 'Error : product '.$cartProduct->product->name.'no found in stock';
                    }
                  }
                  try {
                    //code...
         DB::transaction(function() use($cart){

            $order = Order::create([
                'total_price'=>0
          ]);

          foreach ($cart as $cartProduct) {
            $order->product()->attach($cartProduct->product_id,[
                'quantity' =>$cartProduct->quantity,
                'price' =>$cartProduct->product->sellPrice,
            ]);

            $order->increment('total_price' , $cartProduct->quantity * $cartProduct->product->sellPrice);

            Products::find($cartProduct->product_id)->decrement('quantity' , $cartProduct->quantity);
          }

          cart::where('user_id' , auth()->id() )->delete();
         });

         
         } catch (\Throwable $th) {
            //throw $th;
         }
    }

  

}
