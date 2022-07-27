<div class="space-y-4">


<div class=" flex justify-between">
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
            <x-table.heading sortable wire:click="sortBy('name')"  :direction="$sortField === 'name' ? $sortDirection :null" class="">name </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('size')" :direction="$sortField === 'size' ? $sortDirection :null">Size</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('quality')" :direction="$sortField === 'quality' ? $sortDirection :null">Quality  </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('sellPrice')" :direction="$sortField === 'sellPrice' ? $sortDirection :null">Sell Price  </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('color_id')" :direction="$sortField === 'color_id' ? $sortDirection :null">Color  </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('device_id')" :direction="$sortField === 'device_id' ? $sortDirection :null">Devices  </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('quantity')" :direction="$sortField === 'quantity' ? $sortDirection :null">Quantity  </x-table.heading>
            <x-table.heading />
        </x-slot>
        <x-slot name='body'>

            @forelse ( $accessories as $accessory )
            <x-table.row wire:loading.class.delay="opacity-50">
                <x-table.cell>{{$accessory->name}}</x-table.cell>
                <x-table.cell>{{$accessory->size}}</x-table.cell>
                <x-table.cell>{{$accessory->quality}}</x-table.cell>
                <x-table.cell>{{$accessory->sellPrice}}</x-table.cell>
                <x-table.cell>{{$accessory->color->color}}</x-table.cell>
                <x-table.cell>{{$accessory->device->name}}</x-table.cell>
                <x-table.cell>{{$accessory->quantity}}</x-table.cell>
                <x-table.cell>
                    <div class="space-x-1">

                    
                    <x-button wire:click="edit({{$accessory->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg></x-button>
                    <x-danger-button class="ml-3" wire:click="confirmDelete({{$accessory->id}})"
                        wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                    </x-danger-button>
                </div>
                </x-table.cell>

            </x-table.row>
            @empty
            <x-table.row>
                <x-table.cell colspan="3">
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
            <div class="row">
                <div class="mt-2 ">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input wire:model.defer="accessory.name" id="name" type='text' class="block mt-1 w-full"
                        required :value="old('name')" autofocus />
                    <x-input-error for="accessory.name" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-label for="size" value="{{ __('Size') }}" />
                    <x-input wire:model.defer="accessory.size" id="size" type="text" class="block mt-1 w-full"
                        required :value="old('accessory.size')" autofocus />
                    <x-input-error for="accessory.size" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="quality" value="{{ __('Quality') }}" />
                    <x-input wire:model.defer="accessory.quality" id="quality" type="number"
                        class="block mt-1 w-full" required autofocus />
                    <x-input-error for="accessory.quality" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="quantity" value="{{ __('Quantity') }}" />
                    <x-input wire:model.defer="accessory.quantity" id="quantity" type="number"
                        class="block mt-1 w-full" required autofocus />
                    <x-input-error for="accessory.quantity" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="sellPrice" value="{{ __('Sell Price') }}" />
                    <x-input wire:model.defer="accessory.sellPrice" id="sellPrice" class="block mt-1 w-full"
                        type="text" :value="old('sellPrice')" required />
                    <x-input-error for="accessory.sellPrice" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="buyPrice" value="{{ __('Buy Price') }}" />
                    <x-input wire:model.defer="accessory.buyPrice" id="buyPrice" class="block mt-1 w-full" type="text"
                        :value="old('buyPrice')" required />
                    <x-input-error for="accessory.buyPrice" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="box_id" value="{{ __('boxs') }}" />
                    <select wire:model.defer="accessory.box_id" id="box_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text"
                        :value="old('accessory.box_id')" required >
                        <option selected>Choose a country</option>

                         @foreach ($boxs as  $box)
                             <option value="{{$box->id}}">{{$box->name}}</option>
                         @endforeach
                    </select>
                    <x-input-error for="accessory.box_id" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-label for="device_id" value="{{ __('Devices') }}" />
                    <select wire:model.defer="accessory.device_id" id="device_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text"
                        :value="old('accessory.device_id')" required >
                        <option selected>Choose ..</option>

                         @foreach ($devices as  $device)
                             <option value="{{$device->id}}">{{$device->name}}</option>
                         @endforeach
                    </select>
                    <x-input-error for="accessory.device_id" class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-label for="color_id" value="{{ __('Colors') }}" />
                    <select wire:model.defer="accessory.color_id" id="color_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text"
                        :value="old('color_id')" required >
                         @foreach ($colors as $color)
                             <option value="{{$color->id}}">{{$color->color}}</option>
                         @endforeach
                    </select>
                    <x-input-error for="accessory.color_id" class="mt-2" />
                </div>
             
                
                <div class="mt-4">
                    <x-label for="note" value="{{__('Note')}}" />
                    <x-textarea wire:model.defer="accessory.note" id="note" />
                    <x-input-error for="accessory.note" class="mt-2" />
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-secondary-button wire:click="$toggle('showModel')"
                wire:loading.attr="disabled">
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

