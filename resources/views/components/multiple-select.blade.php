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
                itemSelectText: '', //remove press to select

             })
       })"
>
    <select
        x-ref="{{ $uniqId }}"
        wire:change="$set('{{ $model }}', [...$event.target.options].filter(option => option.selected).map(option => option.value))"
        {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500
        focus:border-green-500 p-2.5 font-arial']) !!}
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
@once
<style>
    .choices__input--cloned {
        width: 300px !important;
        min-width: 100% !important;
        padding: 8px !important;
        box-sizing: border-box !important;
    }

    .choices__inner {
        width: 100% !important;
        min-width: 100% !important;
        padding: 5px !important;
    }

    .choices__list--dropdown {
        width: 100% !important;
        margin-top: 5px !important;
        /* position: absolute !important; */
        z-index: 1000 !important;
    }

    .choices__item--choice:hover {
        background-color: #e5e7eb !important;
        color: #000 !important;
    }

    .choices__item--choice.is-disabled {
        background-color: #d1d5db !important;
        opacity: 0.5 !important;
        cursor: not-allowed !important;
    }

    .choices__list--dropdown{
        height: 200px !important;
    }
    .choices__list{
        height: 200px !important;

    }
</style>

@endonce