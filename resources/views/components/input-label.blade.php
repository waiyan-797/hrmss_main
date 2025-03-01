@props(['value'])

<label {{ $attributes->merge(['class' => 'text-sm text-gray-950 font-arial font-medium font-semibold']) }}>
    {{ $value ?? $slot }}
</label>
