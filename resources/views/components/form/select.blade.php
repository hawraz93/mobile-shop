@props([
    'disabled' => false,
    'selected' => 'Choose ..',
    'array' => null,
    'model' => null,
    'target' => true,
    

    ])

<select wire:model.defer="{{$model}}" 
       {{ $attributes->merge(['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }} >

    <option value='' selected>{{$selected}}</option>
    @foreach ($array as $key => $value)
    <option value="{{$value->id}}">{{$value[$target]}}</option>
    @endforeach
</select>
@error($model)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>
@enderror


{{-- <div class="col-lg-4 col-12 p-2">
    <div class="input-group border mb-3">
        <span class="input-group-text">
            <i class="bi bi-{{ $icon }} mx-2"></i>
        </span>
        <select class="form-control" wire:model="{{ $model }}">
            <option value="">Select {{ $model }}</option>
            @foreach ($array as $key => $value)
                <option value="{{  $value['id'] }}">{{ $value['name'] }}</option>
            @endforeach
        </select>
    </div>
</div> --}}