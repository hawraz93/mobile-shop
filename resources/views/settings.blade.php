<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registeration') }}
        </h2>
    </x-slot>
   
    <div class=" mt-3 grid md:grid-cols-1 lg:grid-cols-2">
      
               <livewire:register.devices>

               <livewire:register.color>
               <livewire:register.types>
       
    </div>
</x-app-layout>
