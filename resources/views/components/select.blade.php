@props(['disabled' => false, 'values' => [], 'placeholder' => '', 'all' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 font-arial']) !!}>
    @if($all)
        <option value="all">All</option>  <!-- Use an empty string for the 'All' option -->
    @endif
    @if ($placeholder)
        <option value="" disabled>{{ $placeholder }}</option>
    @endif
    @foreach ($values as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
    @endforeach
</select>
