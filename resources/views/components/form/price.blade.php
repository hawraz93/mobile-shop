@props(
  [
    'currency'=>false,
    'disabled' => false,
  ]
)

    <div class="mt-1 relative rounded-md shadow-sm w-1/3">
      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm"> $ </span>
      </div>

      <input {{ $disabled ? 'disabled' : '' }} id="price" {!! $attributes->merge(['class' =>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7  sm:text-sm border-gray-300 rounded-md'])!!}  placeholder="0.00">
      
      {{-- har kat curency zyad krd abe input aka  "pr-12" bo zyad bkay agadar ba   --}}
      @if ($currency)
      <div class="absolute inset-y-0 right-0 flex items-center">
        <label for="currency" class="sr-only">Currency</label>
        <select id="currency" name="currency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
          <option>USD</option>
          <option>CAD</option>
          <option>EUR</option>
        </select>
      </div>
      @endif
    </div>
  