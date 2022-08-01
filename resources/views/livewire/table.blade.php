<div>
    <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg p-4  ">

        <x-table2>
            <x-slot name='head'>
                <x-table.th>product </x-table.th>
                <x-table.th>Price</x-table.th>
                <x-table.th>quantity</x-table.th>
            </x-slot>
            <x-slot name='body'>
                @forelse ($sells as $item)
                <x-table.tr>
                    <x-table.td> {{$item->accessory->name}} </x-table.td>
                    <x-table.td> {{$item->sellPrice}} </x-table.td>
                    <x-table.td> 
                        <input  type="text" value='{{$item->quantity}}'>
                     </x-table.td>
                    <x-table.td> 
                             <button wire:click='confirmSell({{$item->id}})' class="text-green-800  bg-green-100  font-medium px-2.5 py-0.5 rounded-full  dark:bg-green-200 dark:text-green-900">{{__('Confirm')}}</button>
                    </x-table.td>
                    <x-table.td>
                        <div wire:click='deleteSell({{$item->id}})'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 bg-gray-100 rounded-full cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>    
                        </div>
                    </x-table.td>
                </x-table.tr>
                    @empty
                    <x-table.tr  calspan="5">
                    <x-table.td>
                        <div class="flex justify-center items-center">
                             <span class="text-xl font-mono text-gray-400">
                                There is no accessories to sell  
                             </span>
                        </div>
                    </x-table.td>
                </x-table.tr>
                    @endforelse
            </x-slot>
        </x-table2>
        <div class="flex justify-between">
            <div></div>
            <div>
                <span>total <strong>300</strong></span>
            </div>
        </div>

    </div>

    <div class="  mx-auto  flex flex-wrap -m-4 mt-3 ">
        <div class="pr-2 lg:w-3/4 w-full ">
            <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 ">
                <div class=" flex justify-between space-y-4 mb-6">
                    <div class="w-1/4">
                        <input wire:model='search' type="text"
                            class=" py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    </div>
                    <div>

                        <x-button wire:click="create">New</x-button>
                    </div>
                </div>


                <div class="flex-col space-y-4">
                    <x-table class="overflow-x-auto">
                        <x-slot name='head'>
                            <x-table.heading sortable wire:click="sortBy('name')"
                                :direction="$sortField === 'name' ? $sortDirection :null" class="">name
                            </x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('size')"
                                :direction="$sortField === 'size' ? $sortDirection :null">Size</x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('quality')"
                                :direction="$sortField === 'quality' ? $sortDirection :null">Quality </x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('sellPrice')"
                                :direction="$sortField === 'sellPrice' ? $sortDirection :null">Sell Price
                            </x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('color_id')"
                                :direction="$sortField === 'color_id' ? $sortDirection :null">Color </x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('device_id')"
                                :direction="$sortField === 'device_id' ? $sortDirection :null">Devices
                            </x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('quantity')"
                                :direction="$sortField === 'quantity' ? $sortDirection :null">Quantity
                            </x-table.heading>
                            <x-table.heading />
                        </x-slot>
                        <x-slot name='body'>

                            @forelse ( $accessories as $accessory )

                            <x-table.row class="cursor-pointer hover:bg-slate-200" wire:click='sells({{$accessory->id}})' wire:loading.class.delay="opacity-50 ">
                                <x-table.cell>{{$accessory->name}}</x-table.cell>
                                <x-table.cell>{{$accessory->size}}</x-table.cell>
                                <x-table.cell>{{$accessory->quality}}</x-table.cell>
                                <x-table.cell>{{$accessory->sellPrice}}</x-table.cell>
                                <x-table.cell>{{$accessory->color->color ?? ''}}</x-table.cell>
                                <x-table.cell>{{$accessory->device->name ?? ''}}</x-table.cell>
                                <x-table.cell>{{$accessory->quantity}}</x-table.cell>
                                <x-table.cell>
                                    <div class="space-x-1">


                                        <x-button wire:click="edit({{$accessory->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 " fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg></x-button>
                                        <x-danger-button class="ml-3" wire:click="confirmDelete({{$accessory->id}})"
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
                                            No accessories found
                                        </span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>

                            @endforelse

                        </x-slot>
                    </x-table>
                    <div>
                        {{$accessories->links()}}

                    </div>
                </div>

                <form wire:submit.prevent="save">
                    <x-dialog-modal wire:model.defer="showModel">
                        <x-slot name='title'>Edit accessory</x-slot>
                        <x-slot name='content'>
                            <div class="row flex  space-x-2">
                                <div class="mt-2 w-1/3">
                                    <x-label for="name" value="{{ __('Name') }}" />
                                    <x-input wire:model.defer="accessory.name" id="name" type='text'
                                        class="block mt-1 w-full"  :value="old('name')" autofocus />
                                    <x-input-error for="accessory.name" class="mt-2" />
                                </div>

                                <div class="mt-2 w-1/3">
                                    <x-label for="type" value="{{ __('Type') }}" />
                                    <x-form.select :array='$types' target='name' model="accessory.type_id" id="box" />
                                </div>
                           
                                <div class="mt-2 w-1/3">
                                    <x-label for="size" value="{{ __('Size') }}" />
                                    <x-input wire:model.defer="accessory.size" id="size" type="text"
                                        class="block mt-1 w-full" :value="old('accessory.size')" />
                                    <x-input-error for="accessory.size" class="mt-2" />
                                </div>
                                
                                <div class="mt-2 w-1/3">
                                    <x-label for="quality" value="{{ __('Quality') }}" />
                                    <x-input wire:model.defer="accessory.quality" id="quality" type="number"
                                        class="bl ock mt-1 w-full"  autofocus />
                                    <x-input-error for="accessory.quality" class="mt-2" />
                                </div>
</div>
                                <div class="row flex  space-x-2">
                                <div class="mt-4 w-1/3 ">
                                    <x-label for="quantity" value="{{ __('Quantity') }}" />
                                    <x-input wire:model.defer="accessory.quantity" id="quantity" type="number"
                                        class="block mt-1 w-full"  autofocus />
                                    <x-input-error for="accessory.quantity" class="mt-2" />
                                </div>
                         
                                <div class="mt-4 w-1/3 ">
                                    <x-label for="sellPrice" value="{{ __('Sell Price') }}" />
                                    <x-input wire:model.defer="accessory.sellPrice" id="sellPrice"
                                        class="block mt-1 w-full" type="text" :value="old('sellPrice')"  />
                                    <x-input-error for="accessory.sellPrice" class="mt-2" />
                                </div>

                                <div class="mt-4 w-1/3 ">
                                    <x-label for="buyPrice" value="{{ __('Buy Price') }}" />
                                    <x-input wire:model.defer="accessory.buyPrice" id="buyPrice"
                                        class="block mt-1 w-full" type="text" :value="old('buyPrice')"  />
                                    <x-input-error for="accessory.buyPrice" class="mt-2" />
                                </div>
                            </div>
                            <div class=" flex space-x-2">
                                <div class="mt-4 w-1/3">
                                    <x-label for="box" value="{{ __('Boxs') }}" />
                                    <x-form.select :array='$boxs' target='id' model="accessory.box_id" id="box" />
                                </div>
                                <div class="mt-4 w-1/3">
                                    <x-label for="device" value="{{ __('Devices') }}" />
                                    <x-form.select :array='$devices' target='name' model="accessory.device_id"
                                        id="device" selected="Chose the Device" />
                                </div>

                                <div class="mt-4 w-1/3">
                                    <x-label for="color" value="{{ __('Colors') }}" />
                                    <x-form.select :array='$colors' target="color" model="accessory.color_id"
                                        id="color" />
                                </div>

                            </div>
                            
                                <div class="mt-4">
                                    <x-label for="note" value="{{__('Note')}}" />
                                    <x-textarea wire:model.defer="accessory.note" id="note" />
                                    <x-input-error for="accessory.note" class="mt-2" />
                                </div>
                        </x-slot>
                        <x-slot name='footer'>
                            <x-secondary-button wire:click="$toggle('showModel')" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-button class="bg-blue-500" wire:loading.attr="disabled">Save</x-button>
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
