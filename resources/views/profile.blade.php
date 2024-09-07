<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white font-semibold italic font-arial">
            {{ __('ကိုယ်ရေးအချက်အလက်') }}
        </h2>
    </x-slot>

    <div class="py-6 h-[83vh] overflow-y-auto w-5/6 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
