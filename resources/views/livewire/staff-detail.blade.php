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
            @if ($tab == 'personal_info')
                @include('staff.personal_info')
            @elseif ($tab == 'job_info')
                <div>This is job info</div>
            @elseif ($tab == 'relative')
                <div>This is relative</div>
            @endif
        </div>
    </div>
</div>

