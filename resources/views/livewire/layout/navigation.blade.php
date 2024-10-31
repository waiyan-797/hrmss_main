<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<nav x-data="{ open: false }" class="  bg-white border-b py-4 border-gray-100 h-[10vh]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-8 flex flex-row items-center justify-between h-full">
        <div class=" w-full ">

            <a href="{{ route('home') }}" class="font-arial flex flex-row items-center gap-x-3 font-semibold text-md italic text-green-700" wire:navigate>
                <img class=" w-16 h-16" src="{{asset('img/DICA_logo.png')}}" alt="">
                HR Management System (HRMS)
            </a>
        </div>

        <!-- Settings Dropdown -->
        <div class="flex flex-col items-center ms-6 justify-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="w-auto h-[7vh] flex flex-row items-center justify-center text-sm leading-4 font-medium rounded-md text-white hover:text-white/90 focus:outline-none transition ease-in-out duration-150">
                        <img id="avatar" src="{{auth()->user()->avatar ? route('file', auth()->user()->avatar) : asset('img/user.png')}}" class="w-[7vh] h-[7vh] border-2 border-green-300 rounded-full" alt="avatar">
                        <div class="ms-1">
                            <svg class="fill-current text-black h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile')" wire:navigate>
                        {{ __('ကိုယ်ရေးအကျဉ်း') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-dropdown-link>
                            {{ __('အကောင့်မှထွက်ပါ') }}
                        </x-dropdown-link>
                    </button>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
