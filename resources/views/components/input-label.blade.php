@props(['value'])

<label {{ $attributes->merge(['class' => 'text-sm text-blue-700 font-arial font-medium']) }}>
    {{ $value ?? $slot }}
</label>
