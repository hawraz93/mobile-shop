<div class="w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <div class=" space-y-4  ">
                <div class="my-4">
                    <span class="text-2xl  text-gray-400 font-serif">Devices</span>
                </div>
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
                            <x-table.heading sortable wire:click="sortBy('name')"
                                :direction="$sortField === 'name' ? $sortDirection :null" class="w-full">name
                            </x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('model')"
                                :direction="$sortField === 'model' ? $sortDirection :null">model</x-table.heading>
                            <x-table.heading sortable wire:click="sortBy('company')"
                                :direction="$sortField === 'company' ? $sortDirection :null">Company
                            </x-table.heading>
                            <x-table.heading />
                        </x-slot>
                        <x-slot name='body'>

                            @forelse ( $devices as $device )
                            <x-table.row wire:loading.class.delay="opacity-50">
                                <x-table.cell>{{$device->name}}</x-table.cell>
                                <x-table.cell>{{$device->model}}</x-table.cell>
                                <x-table.cell>{{$device->company}}</x-table.cell>
                                <x-table.cell>
                                    <div class="space-x-1">

                                    
                                    <x-button wire:click="edit({{$device->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                      </svg></x-button>
                                    <x-danger-button class="ml-3" wire:click="confirmDeleteDevice({{$device->id}})"
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
                                            No Device found
                                        </span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>

                    @endforelse



                    </x-slot>
                    </x-table>
                    <div>
                        {{$devices->links()}}

                    </div>
                </div>

                <form wire:submit.prevent="save">
                    <x-dialog-modal wire:model.defer="showDeviceEditModel">
                        <x-slot name='title'>Edit Device</x-slot>
                        <x-slot name='content'>
                            <div class="mt-2 ">
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input wire:model.defer="editing.name" id="name" type='text'
                                    class="block mt-1 w-full" required :value="old('name')" autofocus />
                                <x-input-error for="editing.name" class="mt-2" />
                            </div>
                            <div class="mt-2 ">
                                <x-label for="model" value="{{ __('Model') }}" />
                                <x-input wire:model.defer="editing.model" id="model" type='text'
                                    class="block mt-1 w-full" required :value="old('model')" autofocus />
                                <x-input-error for="editing.model" class="mt-2" />
                            </div>
                            <div class="mt-2 ">
                                <x-label for="company" value="{{ __('Company') }}" />
                                <x-input wire:model.defer="editing.company" id="company" type='text'
                                    class="block mt-1 w-full" required :value="old('company')" autofocus />
                                <x-input-error for="editing.company" class="mt-2" />
                            </div>
                        </x-slot>
                        <x-slot name='footer'>
                            <x-secondary-button wire:click="$toggle('showDeviceEditModel')"
                                wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-button class="bg-blue-500" wire:loading.attr="disabled">Save</x-button>
                        </x-slot>
                    </x-dialog-modal>
                </form>


                <x-dialog-modal wire:model="deviceDeleteModal">
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
                        <button wire:click='$set("deviceDeleteModal", false)'
                            class="flex-1 px-4 py-2 bg-white hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                            Cancel
                        </button>
                        <button wire:click="deleteDevice({{$deviceDeleteModal}})" wire:loading.attr='disabled'
                            class="flex-1 px-4 py-2 ml-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                            Delete
                        </button>

                    </x-slot>
                </x-dialog-modal>
            </div>
        </div>
    </div>
</div>
