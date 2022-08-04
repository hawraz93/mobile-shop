@props(
[
    'disabled' => false,
    'dollar' => false,
])

<div class="relative">

    
@if ($dollar)
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
    <span class="text-gray-500 sm:text-sm"> $ </span>
</div>
@endif

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>

</div>