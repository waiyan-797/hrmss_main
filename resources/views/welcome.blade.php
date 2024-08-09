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
    <body class="antialiased font-sans">
        <div class="bg-white text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative h-screen flex flex-col items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('img/HR_welcome.jpg') }}');">
                <div class="relative w-full px-6 bg-white bg-opacity-80 p-8 shadow-lg">
                    <header class="grid grid-cols-3 items-center gap-2">
                        <div class="flex col-start-2 py-2">
                            <img src="{{ asset('img/DICA_logo.png') }}" alt="Customs Website Banner" class="w-1/3 h-auto rounded-lg mx-auto">
                        </div>
                    </header>

                    <main class="flex flex-col items-center justify-center">
                        <h1 class="text-blue-700 font-semibold text-xl text-center font-arial">HR Management System (HRMS)</h1>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
