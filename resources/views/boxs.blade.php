<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <div class="flex justify-between items-center m-2">
            <div>
                <input wire:model='search' type="text" id="small-input"
                    class="block py-1 lg:py-2 px-2 w-full text-gray-900 bg-gray-50 rounded border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex">
                <button type="button" data-toggle-dark="light"
                    class="flex items-center p-2 mr-2 text-xs font-medium text-gray-700 bg-white rounded border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg data-toggle-icon="moon" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg data-toggle-icon="sun" class="hidden w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd">
                        </path>
                    </svg>
                    <span class="hidden">Toggle dark mode</span>
                </button>
                <button type="button" data-copy-state="copy"
                    class="flex items-center py-2 px-4 text-xs font-medium text-gray-900 bg-white rounded border border-gray-200 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 copy-to-clipboard-button">
                    <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg> <span class="copy-text">Copy</span>
                </button>
            </div>
        </div>


        @if ($tool)

        <div class=" p-4 m-2">
            <div class="border border-gray-200 p-6 rounded-lg">

                <div class="flex justify-between mb-4">
                    <div>
                        {{-- <button wire:click="createTools" type="button" data-copy-state="copy"  class="flex items-center py-2 px-4 text-xs font-medium text-gray-900 bg-white rounded border border-gray-200 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 copy-to-clipboard-button">
                          Create
                        </button> --}}
                       

                      
                    </div>
                    <div></div>
                </div>

                <div class="space-y-4 sm:space-y-1">

                    @forelse ($tools as $item)

                    <!-- Collection Section -->

                    <div
                        class=" each flex justify-between border-l-2  border-gray-300  mb-3 hover:border-gray-500 p-3  overflow-x-auto">

                        <div class="flex space-x-3 items-center">
                            <div class=" text-blue-600 font-semibold text-sm lg:text-2xl">{{$item->name}}</div>

                            <div class="inline-flex items-center -space-x-px text-xs rounded-md">
                                <button
                                    class="lg:px-4 lg:py-2  font-medium border rounded-l-md hover:z-10 focus:outline-none border-r-0 focus:border-indigo-600 focus:z-10 hover:bg-gray-50 active:opacity-75 "
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                    </svg>
                                </button>

                                <span
                                    class=" lg:px-4 lg:py-1 px-4 py-1 font-medium border hover:z-10 focus:outline-none  focus:z-10  active:opacity-75 border-gray-300  border-y lg:text-xl">12
                                </span>

                                <button
                                    class="lg:px-4 lg:py-2 font-medium border rounded-r-md hover:z-10 focus:outline-none focus:border-indigo-600 focus:z-10 hover:bg-gray-50 active:opacity-75"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 " fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                            <div
                                class="justify-end m-auto text-sm lg:text-2xl text-gray-600 divide-x-[3px] divide-gray-400 ">
                                <span>{{$item->quantity}}</span>
                                <span class="px-2">{{$item->type}}</span>
                                <span class="px-2">{{$item->note}}</span>
                            </div>

                        </div>
                        <div class="flex">
                            <div class="right m-auto mr-0 place-self-end ">

                                <div class="flex items-center -space-x-4 hover:space-x-1">
                                    <button
                                        class="z-10 block p-1  lg:p-4 text-green-700 transition-all bg-green-100 border-2 border-white rounded-full active:bg-green-50 hover:scale-110 focus:outline-none focus:ring"
                                        type="button">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </button>

                                    <button
                                        class="z-20 block p-1 lg:p-4 text-blue-700 transition-all bg-blue-100 border-2 border-white rounded-full active:bg-blue-50 hover:scale-110 focus:outline-none focus:ring"
                                        type="button">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    <button
                                        class="z-30 block p-1  lg:p-4 text-red-700 transition-all bg-red-100 border-2 border-white rounded-full hover:scale-110 focus:outline-none focus:ring active:bg-red-50"
                                        type="button">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="bg-gray-200  w-full md:my-10 my-8" />

                    @empty
                    <h1>Box is empty</h1>
                    @endforelse

                </div>
            </div>
        </div>

        @endif
        <div   wire:loading.delay.class="opacity-50" class="w-full  flex  flex-wrap justify-center ">

            @foreach ($boxs as $box)

            <div wire:click="showTools({{$box->id}})"
                class="flex flex-col  bg-white border hover:shadow-lg rounded-lg w-full m-2 w-[150px] cursor-pointer hover:border-b-4 hover:border-b-blue-500">

                <div class="p-3 grid text-center">
                    <span class="my-1">{{$box->id}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 place-self-center " viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z"
                            clip-rule="evenodd" />
                        <path
                            d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                    </svg>
                </div>
            </div>
            @endforeach

            <div wire:click='createBoxs'
                class="cursor-pointer flex grid flex-col bg-white border hover:shadow-lg  rounded-lg w-full m-2 w-[150px]  border-dashed border-gray-300 border-[3px] hover:border-sky-300  ">
                <div class="p-3 place-self-center bg-slate-200 rounded-full my-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
    {{ $boxs->links() }}


 
    {{-- <x-dialog-modal wire:model="showCreateToolsModal">
        <x-slot name="title">Create</x-slot>
        <x-slot name="content">
            <div class="row">
            <div class="mt-2 ">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input wire:model.defer="item.name" id="name" type='text' class="block mt-1 w-full" wire:model.defer="item.name"  required :value="old('name')" autofocus />
                <x-input-error for="item.name" class="mt-2"/>
            </div>
            <div class="mt-4">
                <x-label for="type" value="{{ __('Type') }}" />
                <x-input wire:model.defer="item.type" id="type" type="text" class="block mt-1 w-full"   required :value="old('type')" autofocus />
                <x-input-error for="item.type" class="mt-2"/>

            </div>
            <div class="mt-4">
                <x-label for="quantity" value="{{ __('Quantity') }}" />
                <x-input wire:model.defer="item.quantity" id="quantity" type="number" class="block mt-1 w-full"   required  autofocus />
                <x-input-error for="item.quantity" class="mt-2"/>

            </div>
            <div class="mt-4">
                <x-label for="sellPrice" value="{{ __('Sell Price') }}" />
                <x-input wire:model.defer="item.sellPrice" id="sellPrice" class="block mt-1 w-full" type="text" :value="old('sellPrice')" required />
                <x-input-error for="item.sellPrice" class="mt-2"/>

            </div>  
            <div class="mt-4">
                <x-label for="buyPrice" value="{{ __('Buy Price') }}" />
                <x-input wire:model.defer="item.buyPrice" id="buyPrice" class="block mt-1 w-full" type="text" :value="old('buyPrice')" required />
                <x-input-error for="item.buyPrice" class="mt-2"/>

            </div>  
            <div class="mt-4">
                <x-label for="note" value="{{__('Note')}}"/>
                <x-textarea wire:model.defer="item.note" id="note"/>
                <x-input-error for="item.note" class="mt-2"/>

            </div>
            </div>  

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showCreateToolsModal',false)" class="mx-2" wire:loading.attr='disabled'>{{__('Close')}} </x-secondary-button>
            <x-button wire:click="saveItem" class="bg-blue-600">Save</x-button>
        </x-slot>
    </x-dialog-modal> --}}
</div>
