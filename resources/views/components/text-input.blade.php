
@props(['disabled' => false ])

<input {{ $disabled ? 'disabled' : '' }}
 {!! $attributes->merge(['class' =>
 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500
  block w-full p-2.5 font-arial']) !!}>
