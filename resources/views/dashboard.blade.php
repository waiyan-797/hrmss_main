<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
            {{ __('Profile') }}
        </x-nav-link>
        <h1 class="text-white font-semibold italic font-arial">Dashboard</h1>
    </x-slot>

    <div class="py-6 h-[83vh] overflow-y-auto w-5/6 px-3">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-700 dark:text-gray-100 font-arial">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates fugiat vero veniam autem optio hic placeat quis quos neque ducimus expedita dicta sed, esse a quia repellat quod ipsum aperiam.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
