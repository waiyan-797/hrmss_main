<div class="w-[80%] ">
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
        </div>
    </div>
    <div class="flex justify-center w-full h-auto overflow-y-auto">
        <div class="w-full mx-auto px-3">
            <form wire:submit="submit_staff()">
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

                <div class="w-full h-[75vh] overflow-y-auto">
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
                        @if (auth()->user()->role_id == 2)
                            @if ($staff)
                                @switch($staff->status_id)
                                    @case(2)
                                        <x-primary-button wire:click="setStaffStatus({{$staff->status_id}})"> Save </x-primary-button>
                                        <x-primary-button wire:click="setStaffStatus(5)"> Approve </x-primary-button>
                                        <x-primary-button wire:click="setStaffStatus(3)"> Reject </x-primary-button>
                                        <x-primary-button wire:click="setStaffStatus(4)"> Send Back </x-primary-button>
                                        @break
                                @endswitch
                            @else
                                <x-primary-button wire:click="setStaffStatus(2)"> Save </x-primary-button>
                            @endif
                        @elseif (auth()->user()->role_id != 2)
                            @if ($staff)
                                @switch($staff->status_id)
                                    @case(1)
                                        <x-primary-button wire:click="setStaffStatus({{$staff->status_id}})"> Save </x-primary-button>
                                        <x-primary-button wire:click="setStaffStatus(2)"> Submit </x-primary-button>
                                        @break
                                @endswitch
                            @else
                                <x-primary-button wire:click="setStaffStatus(1)"> Save Draft </x-primary-button>
                            @endif
                        @endif
                    </div>
                </div>
            </form>
            @switch($add_model)
                @case('edu_group')
                    @include('modals/education_group_modal')
                @break
                @case('edu_type')
                    @include('modals/education_type_modal')
                @break
                @case('edu')
                    @include('modals/education_modal')
                @break
            @endswitch
        </div>
    </div>
</div>


</div>
