@props(['active'])

@php
$classes = ($active ?? false)
            // ? 'font-arial text-white inline-flex items-center px-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            // : 'font-arial text-white inline-flex items-center px-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-green-200 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
            ? 'inline-block p-4 text-yellow-300 bg-green-700 font-semibold rounded-none active'
            : 'font-semibold inline-block p-4 rounded-none bg-green-700 text-white hover:text-white hover:bg-green-800'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
