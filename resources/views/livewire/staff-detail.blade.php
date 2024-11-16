<div class="w-[80%]">
    @if ($displayAlertBox)
        @include('livewire.alert')
    @endif

    <div class="shadow flex items-center h-[6vh] mt-6 mb-3">

        <div class="flex flex-wrap gap-1 text-sm font-arial text-center w-full">
            <x-nav-link :href="route('staff_detail', [
                'confirm_add' => $confirm_add,
                'confirm_edit' => $confirm_edit,
                'staff_id' => $staff_id,
                'tab' => 'personal_info',
            ])" :active="$tab == 'personal_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active min-w-32 ">
                {{ __('ကိုယ်ရေးအချက်အလက်ဖြည့်ရန်') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                'confirm_add' => $confirm_add,
                'confirm_edit' => $confirm_edit,
                'staff_id' => $staff_id,
                'tab' => 'job_info',
            ])" :active="$tab == 'job_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32">
                {{ __('အလုပ်အကိုင်') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                'confirm_add' => $confirm_add,
                'confirm_edit' => $confirm_edit,
                'staff_id' => $staff_id,
                'tab' => 'relative',
            ])" :active="$tab == 'relative'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32">
                {{ __('ဆွေမျိုးများ') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                'confirm_add' => $confirm_add,
                'confirm_edit' => $confirm_edit,
                'staff_id' => $staff_id,
                'tab' => 'detail_personal_info',
            ])" :active="$tab == 'detail_personal_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32">
                {{ __('ငယ်စဉ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်') }}
            </x-nav-link>
            {{-- <x-nav-link   class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32"  :href="route('staff_leave',[$staff_id])">ခွင့်</x-nav-link>
            <x-nav-link    class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32" :href="route('staff_increment',[$staff_id])">နှစ်တိုး</x-nav-link>
            <x-nav-link   class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32"  :href="route('staff_promotion',[$staff_id])">ရာထူးတိုး</x-nav-link>
            <x-nav-link   class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32"  :href="route('staff_depromotion',[$staff_id])">ရာထူးလျော့</x-nav-link>
            <x-nav-link    class="inline-block p-4 text-blue-600  rounded-t-lg active dark:bg-gray-800 dark:text-blue-500  min-w-32" :href="route('staff_retirement',[$staff_id])" >ပြုန်းတီး</x-nav-link>  --}}
            {{-- <h1 class="text-white font-semibold italic font-arial">{{$confirm_add == 1 ? 'Create ' : 'Update '}}Staff</h1> --}}
        </div>
    </div>
    <div class="flex justify-center w-full h-auto overflow-y-auto">
        <div class="w-full mx-auto px-3">
            <form wire:submit="submit_staff">
                @if ($message)
                    <div id="alert-border-1"
                        class="flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="ms-3 text-sm font-medium font-arial"> {{ $message }} </div>
                        <button type="button" wire:click="$set('message', null)"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-border-1" aria-label="Close">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="w-full
                     {{-- h-[75vh]    comment to disable auto scroll  --}}
                 overflow-y-auto">

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


                        @if (!(auth()->user()->role_id == 2 && $staff?->status_id == 3))


                            @if (!(auth()->user()->role_id != 2 && ($staff?->status_id == 2 || $staff?->status_id == 4)))
                                <x-primary-button>{{ $confirm_add == 1
                                    ? __('Submit')
                                    : (auth()->user()->role_id != 2
                                        ? ($staff?->status_id == 3
                                            ? __('Resubmit SaveDraft')
                                            : ($staff?->status_id == 1 && isset($staff?->comment)
                                                ? __('ReSbumit')
                                                : ($staff?->status_id == 5
                                                    ? __('Update')
                                                    : __('Submit'))))
                                        : ($staff?->status_id == 1
                                            ? __('Submit')
                                            : ($staff?->status_id == 5
                                                ? __('Update')
                                                : __('Approve')))) }}</x-primary-button>
                            @endif
                        @endif

                        @if (auth()->user()->role_id == 2 && ($staff?->status_id == 2 || $staff?->status_id == 4))
                            {{-- // pending or resubmit --}}
                            {{-- <button
type='button'
class='inline-flex items-center px-4 py-2 bg-red-700 border-transparent rounded-md font-medium text-sm text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 font-arial'
wire:click='rejectStaff'> --}}


                            @if (auth()->user()->role_id == 2)
                                <button type='button'
                                    class='inline-flex items-center px-4 py-2 bg-red-700 border-transparent rounded-md font-medium text-sm text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 font-arial'
                                    wire:click='rejectStaff'>{{ __('Reject') }}</button>
                            @endif
                        @endif


                    </div>
                </div>



            </form>
        </div>
    </div>
</div>


</div>
