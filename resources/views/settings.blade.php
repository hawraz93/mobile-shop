<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registeration') }}
        </h2>
    </x-slot>
   
    <div class="py-4">
        <div class=" sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" wire:ignore>
               <livewire:registeration>
            </div>
        </div>
    </div>
</x-app-layout>
