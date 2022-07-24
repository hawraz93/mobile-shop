@props([
'sortable' => null,
'direction' => null,]
)

<th {{  $attributes->merge(['class' =>'px-6 py-3 bg-gray-50'])->only('class')}}>

    @unless ($sortable)
    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{$slot}}</span>
    @else

    <button {{$attributes->except('class')}}
        class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">

        <span>{{$slot}}</span>
        <span>
            @if ($direction =='asc')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12" />
              </svg>
            @elseif ($direction =='desc')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 13l-5 5m0 0l-5-5m5 5V6" />
              </svg>

              @else
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 d-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12" />
              </svg>
            @endif
        </span>
    </button>
    @endif
</th>