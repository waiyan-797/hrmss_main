<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HRMS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-arial bg-gradient-to-r from-green-700 to-blue-700">
        <div class="min-h-screen flex flex-col items-center justify-center text-gray-700 dark:text-gray-200">
            <div class="w-full max-w-md bg-gradient-to-r from-green-500 to-blue-500 rounded-lg shadow-lg p-8 transform hover:scale-105 transition-transform duration-300 border border-gray-200 dark:border-gray-700">
                <header class="flex justify-center mb-6">
                    <img src="{{ asset('img/DICA_logo.png') }}" alt="DICA Logo" class="w-32 h-auto shadow-lg rounded-lg bg-white">
                </header>

                <main class="text-center">
                    <h1 class="text-xl font-semibold text-white dark:text-blue-400 mb-4 font-arial">HR Management System (HRMS)</h1>
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </main>
            </div>
        </div>
    </body>
</html>
