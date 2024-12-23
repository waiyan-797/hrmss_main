@props(['options' => [], 'placeholderValue' => '', 'model'])

@php
    $uniqId = 'select' . uniqid();
    $selectedValues = data_get($this, $model);
@endphp

<div wire:ignore
    x-data
    {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 p-2.5 font-arial']) !!}
    x-init="
        $nextTick(() => {
            const choices = new Choices($refs.{{ $uniqId }}, {
                removeItems: true,
                removeItemButton: true,
                placeholderValue: '{{ $placeholderValue }}',
             })
       })"
>
    <select
        x-ref="{{ $uniqId }}"
        wire:change="$set('{{ $model }}', [...$event.target.options].filter(option => option.selected).map(option => option.value))"
        {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 p-2.5 font-arial']) !!}
        multiple
    >
        @foreach($options as $option)
            <option
                value="{{ $option->id }}"
                @if(in_array($option->id, $selectedValues)) selected @endif
            >
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
