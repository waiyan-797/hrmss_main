<div class="w-[80%]">



    @if ($displayAlertBox)
    @include('livewire.alert')
    @endif

    <div class="shadow flex items-center h-[6vh] mt-6 mb-3 ml-3">

        <div class="flex flex-wrap gap-3     text-sm font-arial text-center w-full">
            <x-nav-link :href="route('staff_detail', [
                'confirm_add' => $confirm_add,
                'confirm_edit' => $confirm_edit,
                'staff_id' => $staff_id,
                'tab' => 'personal_info',
            ])" :active="$tab == 'personal_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active min-w-32 ">
                {{ ('ကိုယ်ရေးအချက်အလက်ဖြည့်ရန်') }}
            </x-nav-link>
            @if($staff)

            <x-nav-link :href="route('staff_detail', [
                                'confirm_add' => $confirm_add,
                                'confirm_edit' => $confirm_edit,
                                'staff_id' => $staff_id,
                                'tab' => 'job_info',
                            ])" :active="$tab == 'job_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32 ">
                {{ ('အလုပ်အကိုင်') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                                'confirm_add' => $confirm_add,
                                'confirm_edit' => $confirm_edit,
                                'staff_id' => $staff_id,
                                'tab' => 'relative',
                            ])" :active="$tab == 'relative'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32 ">
                {{ ('ဆွေမျိုးများ') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                                'confirm_add' => $confirm_add,
                                'confirm_edit' => $confirm_edit,
                                'staff_id' => $staff_id,
                                'tab' => 'detail_personal_info',
                            ])" :active="$tab == 'detail_personal_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32 ">
                {{ ('ငယ်စဉ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်') }}
            </x-nav-link>

            @else
            <x-nav-link :href="route('staff_detail', [
                                'confirm_add' => $confirm_add,
                                'confirm_edit' => $confirm_edit,
                                'staff_id' => $staff_id,
                                'tab' => 'job_info',
                            ])" :active="$tab == 'job_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32 pointer-events-none opacity-50">
                {{ ('အလုပ်အကိုင်') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                                'confirm_add' => $confirm_add,
                                'confirm_edit' => $confirm_edit,
                                'staff_id' => $staff_id,
                                'tab' => 'relative',
                            ])" :active="$tab == 'relative'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32 pointer-events-none opacity-50">
                {{ ('ဆွေမျိုးများ') }}
            </x-nav-link>
            <x-nav-link :href="route('staff_detail', [
                                'confirm_add' => $confirm_add,
                                'confirm_edit' => $confirm_edit,
                                'staff_id' => $staff_id,
                                'tab' => 'detail_personal_info',
                            ])" :active="$tab == 'detail_personal_info'" wire:navigate
                class="inline-block p-4 text-green-600  rounded-none active  min-w-32 pointer-events-none opacity-50">
                {{ __('ငယ်စဉ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်') }}
            </x-nav-link>
            @endif
        </div>
    </div>
    <div class="flex justify-center w-full h-auto overflow-y-auto px-4">
        <div class="w-full mx-auto px-3">
            <form wire:submit="submit_staff()">

                <div class="spinner-container !hidden" wire:loading.class.remove="!hidden"
                    wire:loading.class="!opacity-50 !flex">
                    <div class="spinner"></div>
                </div>






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
                        <x-primary-button wire:click="setStaffStatus({{$staff->status_id}})"> Save
                        </x-primary-button>
                        <x-primary-button wire:click="setStaffStatus(5)"> Approve </x-primary-button>
                        {{-- <x-primary-button wire:click="setStaffStatus(3)"> Reject </x-primary-button> --}}
                        <x-primary-button wire:click="setStaffStatus(4)"> Send Back </x-primary-button>
                        @break
                        @case(5)
                        <x-primary-button wire:click="setStaffStatus(null)"> Save </x-primary-button>
                        @break
                        @endswitch
                        @else
                        <x-primary-button wire:click="setStaffStatus(2)"> Save </x-primary-button>
                        @endif
                        @elseif (auth()->user()->role_id != 2)
                        @if ($staff)
                        @switch($staff->status_id)
                        @case(1)
                        <x-primary-button wire:click="setStaffStatus({{$staff->status_id}})"
                            wire:loading.attr="disabled"> Save </x-primary-button>
                        <x-primary-button wire:click="setStaffStatus(2)"> Submit </x-primary-button>
                        @break
                        @case(4)
                        <x-primary-button wire:click="setStaffStatus(null)"> Save </x-primary-button>
                        <x-primary-button wire:click="setStaffStatus(2)"> Submit </x-primary-button>
                        @break
                        @case(5)
                        <x-secondary-button wire:click="commentStaff(true)"> Request </x-primary-button>
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
            @case('edu_modal')
            @include('modals/edu_modal')
            @break
            @case('recommendations_modal')
            @include('modals/recommendation_modal')
            @break
            @case('multiple_modal')
            @include('modals/multiple_modal')
            @break
            @endswitch
        </div>
    </div>
</div>
{{-- @script
<script type='defer'>


    // Show Alert
        Livewire.on('showAlert', data => {Livewire.on('alert', ({ type, message }) => {
                Swal.fire({
                    icon: type,
                    title: type === 'success' ? 'Success' : 'Error',
                    text: message,
                    timer: 2000,
                    showConfirmButton: false
                });
            });
            
            Swal.hideLoading(); // Close the previous Swal instance (if it's still open)
            setTimeout(() => {
                Swal.fire({
                    title: 'Success!',
                    text: data[0].message,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    showConfirmButton: true,
                });
            }, 0);
        });

        // Show Loader
        //Livewire.on('showLoader', data => {
         //   console.log('lading');
         //   Swal.fire({
          //      title: 'Please wait...',
           //     text: 'We are processing your request',
           //     icon: 'info',
           //     showConfirmButton: false,
           //     didOpen: () => {
           //         Swal.showLoading(); // Show the loading spinner
            //    }
           // });
       // });

        // Stop Loader
       // Livewire.on('stopLoader', data => {
       //     Swal.close(); // Close the loader after the process is complete
       // });







</script>
@endscript --}}


@script
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('showRemoveConfirmation', ({ index, id }) => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Do you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('removeRecommendation', { index: index, id: id });
                }
            });
        });

        //alert message
        Livewire.on('alert', (data) => {
            Swal.fire({
                icon: 'success',
                title: data[0].type,
                text: data[0].message, 
                position: 'top-end',
                toast: true,
                timer: 4000,
                timerProgressBar: true,
                showConfirmButton: false,
                background: '#009900',
                customClass: {
                    popup: 'p-4 rounded-lg shadow-lg',
                    title: 'font-bold text-white',
                    htmlContainer: 'text-sm text-white'
                }
            });
           
        });

        //validation message
        Livewire.on('validation', (data) => {
            console.log(data[0])
             Swal.fire({
                icon: 'error',
                title: data[0].type,
                text: data[0].message, 
                position: 'top-end',
                toast: true,
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false,
                background: '#770000',
                customClass: {
                    popup: 'p-4 rounded-lg shadow-lg',
                    title: 'font-bold text-white',
                    htmlContainer: 'text-sm text-white'
                }
            });
           
        });


        // New listener for validation errors
        Livewire.on('showErrors', (data) => {
            console.log(data[0].errors)
            let errors = data[0].errors;
            errors.forEach(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: error, 
                    position: 'bottom-end',
                    toast: true,
                    timer: 4000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background: '#fee2e2',
                    customClass: {
                        popup: 'p-4 rounded-lg shadow-lg',
                        title: 'font-bold text-red-600',
                        htmlContainer: 'text-sm text-red-800'
                    }
                });
            });
        });
    });
</script>
@endscript

</div>