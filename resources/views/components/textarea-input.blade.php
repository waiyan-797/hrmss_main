@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} 
{!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 font-arial']) !!}
rows="4" 
>
{{ $slot }}</textarea>



