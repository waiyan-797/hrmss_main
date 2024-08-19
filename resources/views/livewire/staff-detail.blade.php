<div class="w-full">
    <x-slot name="header">
        <a
            href="{{ route('staff') }}"
            wire:navigate
            class="inline-flex items-center justify-center p-2 text-white bg-blue-500 hover:bg-blue-400 rounded-full font-semibold"
        >
            <!-- Close icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </a>
        <x-nav-link :href="route('staff_detail', ['tab' => 'personal_info'])" :active="$tab == 'personal_info'" wire:navigate>
            {{ __('Personal Information') }}
        </x-nav-link>
        <x-nav-link :href="route('staff_detail', ['tab' => 'job_info'])" :active="$tab == 'job_info'" wire:navigate>
            {{ __('Job Information') }}
        </x-nav-link>
        <x-nav-link :href="route('staff_detail', ['tab' => 'relative'])" :active="$tab == 'relative'" wire:navigate>
            {{ __('Relatives') }}
        </x-nav-link>
        <h1 class="text-white font-semibold italic font-arial">Staff Form</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <form wire:submit="submit_staff">
                @if ($message)
                    <div id="alert-border-1" class="flex items-center p-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium font-arial"> {{$message}} </div>
                        <button type="button" wire:click="$set('message', null)" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-1" aria-label="Close">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif
                @if ($tab == 'personal_info')
                    @include('staff.personal_info')
                @elseif ($tab == 'job_info')
                    @include('staff.job_info')
                @elseif ($tab == 'relative')
                    @include('staff.relative')
                @elseif ($tab == 'detail_personal_info')
                    @include('staff.detail_personal_info')
                @endif
                <div class="pb-5">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

