
@props(['disabled' => false , 'err' => null  , 'NoneedValidate' => null    ])

<input {{ $disabled ? 'disabled' : '' }}
 {!! $attributes->merge(['class' => 
 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500
  block w-full p-2.5 font-arial']) !!}>

@if(!$NoneedValidate)

@error($err)
<p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
@enderror
@endif 