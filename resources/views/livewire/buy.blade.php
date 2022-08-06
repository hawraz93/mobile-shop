<div>
    <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg p-4  ">
@if ($productCreate)
    

        <form wire:submit.prevent="save">

            <div class="row flex  space-x-2  ">

                <div class="mt-2 md:w-1/3 ">
                    <x-label for="product" value="{{ __('Products') }}" />
                    <x-form.select :array='$products' target='name' model="item.product_id" id="product"
                        selected="Chose the Product" />
                </div>

                <div class="mt-2  md:w-1/3 ">
                    <x-label for="quantity" value="{{ __('Quantity') }}" />
                    <x-input wire:model.defer="item.quantity" id="quantity" type="number" class="block mt-1 w-full"
                        autofocus />
                    <x-input-error for="item.quantity" class="mt-2" />
                </div>


                <div class="mt-2 md:w-1/3">
                    <x-label for="delegate" value="{{ __('Deligate') }}" />
                    <x-input wire:model.defer="item.delegate" id="delegate" type='text' class="block mt-1 w-full"
                        :value="old('delegate')" autofocus />
                    <x-input-error for="item.delegate" class="mt-2" />
                </div>

                <div class="mt-2 md:w-1/3">
                    <x-label for="phone" value="{{ __('Delicage Phone') }}" />
                    <x-input wire:model.defer="item.delegate_phone" id="phone" type='text' class="block mt-1 w-full"
                        :value="old('delegate_phone')" autofocus />
                    <x-input-error for="item.delegate_phone" class="mt-2" />
                </div>

            </div>

            <div class="mt-4">
                <x-label for="note" value="{{__('Note')}}" />
                <x-textarea wire:model.defer="item.note" id="note" />
                <x-input-error for="item.note" class="mt-2" />
            </div>
            <div class="mt-2">
                <x-button class="bg-blue-500" wire:loading.attr="disabled">Save</x-button>
            </div>

        </form>
        @endif
    </div>

    <div class="  mx-auto  flex flex-wrap -m-4 mt-3 ">
        <div class="pr-2 lg:w-3/4 w-full ">
            <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 ">
                <div class=" flex justify-between space-y-4 mb-6">

                    <div class="w-1/4">
                        <div class="pt-2 relative mx-auto text-gray-600">
                            <input wire:model='search'
                                class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                    xml:space="preserve" width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>

                        <x-button wire:click="createOrder">New</x-button>

                    </div>
                </div>


                <div class="flex-col space-y-4">
                    <x-table class="overflow-x-auto">
                        <x-slot name='head'>
                            <x-table.heading sortable wire:click="sortBy('order')"
                                :direction="$sortField === 'order' ? $sortDirection :null" class="">
                                {{ __('Order')}}
                            </x-table.heading>

                            <x-table.heading sortable wire:click="sortBy('price')"
                                :direction="$sortField === 'price' ? $sortDirection :null"> {{ __('Price')}}
                            </x-table.heading>

                            <x-table.heading sortable wire:click="sortBy('productNum')"
                                :direction="$sortField === 'productNum' ? $sortDirection :null">{{__("Num Product")}}
                            </x-table.heading>
                         
                            <x-table.heading sortable wire:click="sortBy('shipping')"
                                :direction="$sortField === 'shipping' ? $sortDirection :null">{{__("Shipping")}}
                            </x-table.heading>  
                             <x-table.heading sortable wire:click="sortBy('company')"
                                :direction="$sortField === 'company' ? $sortDirection :null">{{__("Where")}}
                            </x-table.heading>
                            <x-table.heading>
                            </x-table.heading>

                        </x-slot>
                        <x-slot name='body'>

                            @forelse ( $orders as $order )

                            <x-table.row wire:click.prevent='addToProduct({{$order->id}})' class="cursor-pointer hover:bg-slate-200"
                                wire:loading.class.delay="opacity-50 ">
                                <x-table.cell>{{$order->order }}</x-table.cell>
                                <x-table.cell>{{$order->price}} {{$order->rate}}</x-table.cell>
                                <x-table.cell>{{$order->productNum}}</x-table.cell>
                                <x-table.cell>{{$order->shipping}}</x-table.cell>
                                <x-table.cell>
                                    <div class="column">
                                        {{$order->company}}
                                        {{$order->country}}
                                    </div>
                                </x-table.cell>
                                <x-table.cell>
                                    <div class="space-x-1">


                                        <x-button wire:click="editOrder({{$order->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 " fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg></x-button>
                                        <x-danger-button class="ml-3" wire:click="confirmDelete({{$order->id}})"
                                            wire:loading.attr="disabled">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </x-danger-button>
                                    </div>
                                </x-table.cell>

                            </x-table.row>
                            @empty
                            <x-table.row>
                                <x-table.cell colspan="7">
                                    <div class="flex justify-center items-center space-x-2">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-medium py-8 text-gray-400  text-xl">
                                            No order found
                                        </span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>

                            @endforelse

                        </x-slot>
                    </x-table>
                    <div>
                        {{$orders->links()}}

                    </div>
                </div>

                <form wire:submit.prevent="saveOrder">
                    <x-dialog-modal wire:model.defer="showModel">
                        <x-slot name='title'> 
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Order</h3>

                        </x-slot>
                        <x-slot name='content'>
                            <div class="grid md:grid-cols-3 md:gap-6  ">
            
                                <div class="mt-2 relative z-0  w-full group  ">
                                    <x-label for="order" value="{{ __('Orders') }}" />
                                    <x-input wire:model.defer="order.order" id="order" type="text" class="block mt-1 w-full"
                                        autofocus />
                                    <x-input-error for="order.order" class="mt-2" />
                                </div>
            
                                <div class="mt-2 relative z-0  w-full group ">
                                    <x-label for="price" value="{{ __('Price') }}" />
                                    <x-input wire:model.defer="order.price" id="price" type='text' class="block mt-1 w-full"
                                        :value="old('price')" autofocus />
                                    <x-input-error for="order.price" class="mt-2" />
                                </div>
            
                                <div class="mt-2 relative z-0  w-full group ">
                                    <x-label for="priceType" value="{{ __('Type price') }}" />
                                    <select wire:model.defer="priceType" id="priceType"
                                        class='block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'>
                                        @foreach (App\Models\buyOrder::PRICETYPE as $value => $label)
                                        <option value="{{$value}}">{{$label}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-2 relative z-0  w-full group ">
                                    <x-label for="rate" value="{{ __('Rate') }}" />
                                    <x-input wire:model.defer="order.rate" id="rate" type='text' class="block mt-1 w-full"
                                        :value="old('rate')" autofocus />
                                    <x-input-error for="order.rate" class="mt-2" />
                                </div>
            
                                <div class="mt-2 relative z-0  w-full group ">
                                    <x-label for="shipping" value="{{ __('Shipping') }}" />
                                    <x-input wire:model.defer="order.shipping" id="shipping" type='text' class="block mt-1 w-full"
                                        :value="old('shipping')" autofocus />
                                    <x-input-error for="order.shipping" class="mt-2" />
                                </div>
                          
                        </div>



                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-400"></div>
                            <span class="flex-shrink mx-4 text-gray-400">Extra </span>
                            <div class="flex-grow border-t border-gray-400"></div>
                        </div>
                            <div class="grid md:grid-cols-3 md:gap-3">
            
                                <div class="mt-2 relative z-0 w-full group">
                                    <x-label for="productsNum" value="{{ __('Number of product') }}" />
                                    <x-input wire:model.defer="order.productsNum" id="productsNum" type='number'
                                        class="block mt-1 w-full" :value="old('productsNum')" autofocus />
                                    <x-input-error for="order.productsNum" class="mt-2" />
                                </div>
                                <div class="mt-2 relative z-0 w-full group">
                                    <x-label for="company" value="{{ __('Company') }}" />
                                    <x-input wire:model.defer="order.company" id="company" type='number' class="block mt-1 w-full"
                                        :value="old('company')" autofocus />
                                    <x-input-error for="order.company" class="mt-2" />
                                </div>
                                <div class="mt-2 relative z-0 w-full group">
                                    <x-label for="country" value="{{ __('Country') }}" />
                                    <x-input wire:model.defer="order.country" id="country" type='number' class="block mt-1 w-full"
                                        :value="old('country')" autofocus />
                                    <x-input-error for="order.country" class="mt-2" />
                                </div>
            
                            </div>
            
                            <div class="mt-4">
                                <x-label for="note" value="{{__('Note')}}" />
                                <x-textarea wire:model.defer="order.note" id="note" />
                                <x-input-error for="order.note" class="mt-2" />
                            </div>
                        </x-slot>
                            <x-slot name='footer'>
                                <div class='gap-6'>


                                <x-secondary-button wire:click="$toggle('showModel')" wire:loading.attr="disabled">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-button class="bg-blue-500" wire:loading.attr="disabled">Save</x-button>
                            </div>
                            </x-slot>
                    </x-dialog-modal>
                </form>


                <x-dialog-modal wire:model="deleteModal">
                    <x-slot name="title" class="">
                        <div class="flex">
                            <div>
                                <svg class="w-6 h-6 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h2 class="font-semibold text-gray-800">Delete Alert Title With Large Action</h2>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex">
                            <div class="ml-3">
                                <p class="mt-2 text-sm text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet,
                                    consectetur
                                    adipisicing elit. Eum impedit ipsam nam quam! Ab accusamus aperiam distinctio
                                    doloribus,
                                    praesentium quasi reprehenderit soluta unde?</p>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="footer">
                        <button wire:click='$set("deleteModal", false)'
                            class="flex-1 px-4 py-2 bg-white hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                            Cancel
                        </button>
                        <button wire:click="delete({{$deleteModal}})" wire:loading.attr='disabled'
                            class="flex-1 px-4 py-2 ml-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                            Delete
                        </button>

                    </x-slot>
                </x-dialog-modal>

            </div>
        </div>
        <div class="lg:w-1/4 w-full ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 ">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae,
                similique? Inventore ad exercitationem cum soluta. Possimus vero modi et dignissimos
                consequuntur, ipsa magni sint non quis,
                veniam architecto odio aperiam tempore provident eum tempora soluta
                numquam officia nulla assumenda, ab ducimus optio saepe?
                Mollitia fugit vitae rerum dicta a voluptatibus dolores,
                tempore harum minima quisquam in facere soluta provident ea aliquid commodi eos.
                Cupiditate velit ab impedit possimus iure molestias! Totam, alias et. Aspernatur hic atque
                commodi porro officia ipsa ipsam eveniet, sit odit ea, dolores numquam voluptates,
                deleniti quasi officiis. Ut totam adipisci ipsa assumenda labore placeat sapiente
                quaerat.
            </div>
        </div>
    </div>






</div>