<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registeration') }}
        </h2>
    </x-slot>
    <style>
        /* FLICKER REMOVE */
        [x-cloak] {
            display: none;

        }

    </style>
    <div class="container mt-3 grid md:grid-cols-1 lg:grid-cols-2 ">

        {{-- x-data --}}
        <div x-data="{open:false,name:'hawraz',search:''}" >
            {{-- x-on x-bind --}}
            <button 
                 x-on:click='open=!open'
                 x-bind:class='open ? "bg-blue-800 " : "bg-slate-700"'
                  class="rounded-xl  text-white px-4 py-2">
                Toggle
            </button>
            {{-- x-show & x-transition --}}
            <div x-show='open' x-transition x-cloak>
                <p class="bg-gray-200 p-4 my-6 rounded">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat unde velit enim expedita sapiente
                    vero quidem? Sapiente, voluptas. Vitae culpa sunt cupiditate, ipsam vero itaque facere animi. Enim,
                    officiis modi?
                </p>
            </div>


            {{-- x-text --}}
            <div>
                my name is <span x-text='name' class="text-gray-800 text-xl font-bold"></span>
            </div>

            {{-- x-effect --}}
            {{-- <div x-effect='alert()'></div> --}}

            {{-- x-model --}}
            <input x-model='search'  type="text" class="border p-2 w-full mb-2 mt-6 rounded-lg"  placeholder='search for ...'>
               <p>
                <span  class="font-bold">Searching for :</span>
                <span x-text='search'></span>
            </p>


            <template x-if="open">
             <div class="bg-gray-50 p-2 mt-8">Template is show </div>
            </template>
        </div>












        {{-- <livewire:register.devices>

               <livewire:register.color>
               <livewire:register.types> --}}

    </div>
</x-app-layout>
