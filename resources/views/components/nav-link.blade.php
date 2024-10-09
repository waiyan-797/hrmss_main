@props(['active'])

@php
$classes = ($active ?? false)
            // ? 'font-arial text-white inline-flex items-center px-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            // : 'font-arial text-white inline-flex items-center px-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-blue-200 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
            ? 'inline-block p-4 text-blue-600 bg-gray-300 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500'
            : 'inline-block p-4 rounded-t-lg text-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
