<div >
    
    <x-validation-errors class="mb-4" />
<div class="flex gap-6 my-7 divide-y-4  divide-x-4">


    <div class="bg-white w-1/2 py space-y-4  ">
        <div>
            <div class="w-1/4">
                <input wire:model='search' type="text" class=" py-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </div>
        </div>

        <div class="flex-col space-y-4">
        <x-table>
            <x-slot name='head'>
                <x-table.heading sortable wire:click="sortBy('name')">name</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('model')">model</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('company')">Company</x-table.heading>
            </x-slot>
            <x-slot name='body'>

                @forelse ( $devices as $device )
                    <x-table.row  wire:loading.class.delay="opacity-50">
                    <x-table.cell>{{$device->name}}</x-table.cell>
                    <x-table.cell>{{$device->model}}</x-table.cell>
                    <x-table.cell>{{$device->company}}</x-table.cell>
                   
                </x-table.row>
                @empty  
                    <x-table.row>
                        <x-table.cell colspan="3">
                             <div  class="flex justify-center items-center space-x-2">
                                    
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                          </svg>
                                     <span class="font-medium py-8 text-gray-400  text-xl">
                                        No Device found
                                    </span>
                             </div>
                        </x-table>
                    </x-table>
                @endforelse 
                    
                
     
            </x-slot>
          </x-table>
          <div>
              {{$devices->links()}}

          </div>
        </div>
    </div>

    {{-- <div class="bg-white w-1/2">
        <x-table>
            <x-slot name='head'>
                <x-table.heading sortable>id</x-table.heading>
                <x-table.heading sortable>color</x-table.heading>
            </x-slot>
            <x-slot name='body'>
                @foreach ($colors as $color)
                <x-table.row>
                    <x-table.cell>{{$color->id}}</x-table.cell>
                    <x-table.cell>{{$color->color}}</x-table.cell>
                </x-table.row>
                @endforeach
            </x-slot>
          </x-table>
          {{$colors->links()}}
    </div> --}}
</div>
</div>
